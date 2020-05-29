<?
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use Slim\Routing\RouteCollectorProxy as RouteCollectorProxy;

include("Morea/Morea.php");
require_once("EF/ORM/Resources.php");
require_once("EF/ORM/Library.php");

use EF\ORM\Resources as Resources;
use EF\ORM\Library as Library;

function push_error($item) {
	return function($errno, $errstr, $errfile, $errline, $errcontext) use ($item) {
		if (!is_array($item['errors'])) {
				$item['errors'] = [];
		}
		array_push($item['errors'], ['string' => $errstr, 'line' => $errline, 'context' => $errcontext]); 
		return $item;
	};
}

$libraryGroupMiddleware = function (Request $request, RequestHandler $handler) {
    $user = $request->getAttribute('user');
    $classconfig = $request->getAttribute('classconfig');

    $request = $request->withAttribute('library', new Library($user, $classconfig['repobase']));
    
    $response = $handler->handle($request);

    return $response;
};

/*
function mapItemRequest($branch) {
    return function(Request $request, Response $response, array $args) use ($branch) {
    };
    }*/

$group->group('/library', function(RouteCollectorProxy $group) {
    $group->get('/items/', function(Request $request, Response $response, array $args) use ($container) {
        $lib = $request->getAttribute('library');
        
        return $response->withJSON($lib->items());
    });
    
    $group->map(['GET', 'POST', 'PUT', 'OPTIONS'], '/items/{item_type}/{item_id}', function(Request $request, Response $response, array $args) {
        $method = $request->getMethod();
        $user = $request->getAttribute('user');
        $lib = $request->getAttribute('library');
        extract($args);
        
        $userCanViewWorking = in_array($user['priv'], ['admin', 'gta', 'ta']);
        $userCanModify = in_array($user['priv'], ['admin', 'gta']);
        $itemPath = $item_type . '/' . $item_id;
        
        $query = $request->getQueryParams();
        $workingCopy = $userCanViewWorking && isset($query['workingCopy']);
        
        if (in_array($method, ['GET', 'OPTIONS'])) { 
            $item = $lib->get($itemPath, $workingCopy);
            if ($item) {
                $resp = $item->getYAML();
                $resp['morea_type'] = $item_type; // sanitize type and id
                $resp['morea_id'] = $item_id;     // against user entry error
                /* eventually this probably should not be stored in the
                 * .md file at all except for export to morea-strict
                 * format */
            }
        }
        
        switch($method) {
        case 'OPTIONS':
            $allowed = ['OPTIONS'];
            if ($resp['published'] || in_array($user['priv'], ['admin', 'gta', 'ta'])) {
                $allowed[] = 'GET';
            }
            if ($user['priv'] === 'admin') {
                $allowed[] = 'POST';
                $allowed[] = 'PUT';
            }
            return $response->withHeader('Allow', implode(', ', $allowed));
        case 'GET':        
            if ($resp) {
                if (!$resp['published'] && !in_array($user['priv'], ['admin', 'gta', 'ta'])) {
                    return $response->withJSON(array('message' => 'Item not published'), 403);
                }
                
                if ($userCanViewWorking) {
                    $itemKey = $workingCopy ? 'isWorkingCopy' : 'hasWorkingCopy';
                    $resp["isWorkingCopy"] = $lib->hasWorkingCopy($itemPath) ? $workingCopy : null;
                    //$resp["hasWorkingCopy] = $lib->hasWorkingCopy($itemPath);
                }
                $resp['content'] = $item->getContent();
                return $response->withJSON($resp);
            } else {
                return $response->withJSON(array('message' => 'Not Found'), 404);
            }
        case 'POST':
        case 'PUT':
            if (!in_array($user['priv'], ['admin'])) {
                return $response->withJSON(array('message' => 'User does not have write permission'), 403);
            } else {
                $reqdata = $request->getParsedBody();
                $content = $reqdata['content'];
                unset($reqdata['content']);
                $lib->stage($item_type . '/' . $item_id, $reqdata, $content);
                return $response->withJSON(array('message' => 'done. varification of save not implemented yet, use caution',
                                                 'payload' => $reqdata), 200);
                //return $response->withJSON(array('message' => 'Writing to items not implemented yet'), 501);
            }
        }
    });
})->add($libraryGroupMiddleware);

/*
$group->group('/morea', function(RouteCollectorProxy $group) {
	$morea = new Morea('../src/morea');

    $group->get('/validate', function(Request $request, Response $response, array $args) use ($morea) {
        return $response->withJSON($morea->validate());
    });       
      
	$group->get('/modules/', function(Request $request, Response $response, array $args) use ($morea) {
		return $response->withJSON(iterator_to_array($morea->modules(), FALSE));
	})->setName('morea');

    $group->post('/working/items/{item_id}', function(Request $request, Response $response, array $args) use ($morea) {
        $user = $request->getAttribute('user');
        $classconfig = $request->getAttribute('classconfig');
        
        $lib = new Library($user, $classconfig);

        $lib->stageChunk($args['item_id']);
    });

    $group->post('/commit/item/{item_id}', function(Request $request, Response $response, array $args) use ($morea) {
        $user = $request->getAttribute('user');
        $classconfig = $request->getAttribute('classconfig');
        
        $lib = new Library($user, $classconfig);
        $lib->commitChunk($args['item_id']);
    });
        
    $group->get('/modules/{module_id}', function(Request $request, Response $response, array $args) use ($morea) {
        $user = $request->getAttribute('user');
		$db = $request->getAttribute('efdb');
       	$classconfig = $request->getAttribute('classconfig');
		$classconfig['user'] = $user; 
 		$classconfig['netid'] = $user['username'] ? $user['username'] : '[netid]';
		//$env = array('wwwroot' => $classconfig['wwwroot'], 'user' => $user, 'netid' => $user ? $user['username'] : '[netid]');

		$al = new Resources($db, $classconfig);

		$module_id = $args['module_id'];
		$m = new Mustache_Engine();
	#	echo $m->render('Hello, {{planet}}!', array('planet' => 'World'));
		#$response->getBody()->write("Hello, morea");
		$module = array_map(function($item) use($m, $classconfig) {
			set_error_handler(push_error($item));
			$content = $m->render($item['content'], $classconfig);
			restore_error_handler();
			$item['content'] = $content;	
			return $item;
		}, $morea->module($module_id));

		#$module = $morea->module($module_id);
		if ($module) {
			return $response->withJSON(['modules' => $module, 'resources' => $al->items(), 'env' => $classconfig]);
		} else {
			return $response->withJSON(['status' => $module_id . ': Not Found', 'module_id' => $module_id], 404);
		}	
	});

	$group->get('/modules/{module_id}/notes', function(Request $request, Response $response, array $args) use ($morea) {
		global $wwwroot;
		$module_id = $args['module_id'];
		$notes = array_map(function($item) use($env) {
			return extractNotes($item);
		}, $morea->module($module_id));	
		return $response->withJSON($notes);
	});
});
*/

?>
