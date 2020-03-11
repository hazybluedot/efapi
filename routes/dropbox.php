<?
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use Slim\Routing\RouteCollectorProxy as RouteCollectorProxy;

require_once('inc/common_proj_funcs.inc.php');
require_once('inc/Project.php');
require_once('sqlHelpers.php');

$group->group('/dropbox', function(RouteCollectorProxy $group) {
	$group->get('/', function(Request $request, Response $response, array $args) {
		$db = $request->getAttribute('efdb');
		$user = $request->getAttribute('user');

		$q = "SELECT pid, description, visible, time_start, time_late, time_end FROM `dropbox`";
		if (!in_array($user['priv'], ['admin', 'ta'])) {
			$q .= " WHERE visible = '1'"; 
		}
		
		$data = $db->query($q . ';', 'result_map'); 

		return $response->withJSON(['status' => true, 'items' => $data]);
	}); 

	$group->group('/{pid}', function(RouteCollectorProxy $group) {
		$group->get("/[{sid}/]", function(Request $request, Response $response, array $args) {
			$db = $request->getAttribute('efdb');
			$user = $request->getAttribute('user');
			$pi = $request->getAttribute('pi');
	
			$pi->items = $pi->getFileList();
			return $response->withJSON(['status' => true, 'data' => $pi]);
		});

		$group->get("/files/", function(Request $request, Response $response) {
				
		});
	})->add(function(Request $request, RequestHandler $handler) use($group) {
		$classconfig = $request->getAttribute('classconfig');
		$user = $request->getAttribute('user');
		$db = $request->getAttribute('efdb');
		$pid = $request->getAttribute('route')->getArgument('pid');

		try { 
			$pi = new Project($pid, $db, $classconfig, $user);
		} catch (\Exception $e) {
			$response = $group->getResponseFactory()->createResponse();
			return $response->withJSON(['status' => 'invalid project id'], 422);
		}	

		$request = $request->withAttribute('pi', $pi);
		$response = $handler->handle($request);

		return $response;
	}); 
});

?>
