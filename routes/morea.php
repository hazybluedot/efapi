<?
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use Slim\Routing\RouteCollectorProxy as RouteCollectorProxy;

include("Morea/Morea.php");
require_once("EF/ORM/Resources.php");

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

$group->group('/morea', function(RouteCollectorProxy $group) {
	$morea = new Morea('../src/morea');
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
    }
        
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
			return $response->withJSON(['status' => 'Not Found', 'module_id' => $module_id], 404);
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


?>
