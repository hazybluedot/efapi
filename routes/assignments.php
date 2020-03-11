<?
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use Slim\Routing\RouteCollectorProxy as RouteCollectorProxy;


//require_once('Assignments/Assignments.php');
require_once('sqlHelpers.php');
require_once("EF/ORM/Resources.php");

use EF\ORM\Resources as Resources;

$group->group('/assignments', function (RouteCollectorProxy $group) {
    $group->get('/', function (Request $request, Response $response, array $args) {
        $db = $request->getAttribute('efdb');
        $user = $request->getAttribute('user');
       	$classconfig = $request->getAttribute('classconfig');
 
		$al = new Resources($db, $classconfig);

        return $response->withJSON($al->items());
        /*
    } else {
            $response->withStatus(404);
            $response->getBody()->write("Server error: query failed");
        }
        return $response;*/
    });
    
    $group->get('/{module_id}', function (Request $request, Response $response, array $args) use ($time_cutoffs, $assignment_map) {
        $db = $request->getAttribute('efdb');
        $time_fields = implode(",", $time_cutoffs);
        
		$q = "SELECT title,shortname, time_start,{$time_fields},time_end,time_weights FROM `quiz_setup` WHERE `shortname` LIKE ? AND time_start >= (SELECT MIN(starttime) FROM `calendar`)";
        $param = "%{$args['module_id']}%";
        $data = $db->query($q, $assignment_map, "s", $param);
		
	    return $response->withJSON($data);
    });
});

?>

