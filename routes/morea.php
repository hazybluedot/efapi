<?
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use Slim\Routing\RouteCollectorProxy as RouteCollectorProxy;
include("Morea/Morea.php");

$app->group('/morea', function(RouteCollectorProxy $group) {
	$morea = new Morea('../src/morea');
	$group->get('/modules/', function(Request $request, Response $response, array $args) use ($morea) {
		return $response->withJSON($morea->modules());
	})->setName('morea');

	$group->get('/modules/{module_id}', function(Request $request, Response $response, array $args) use ($morea) {
		global $wwwroot;

	$env = array('wwwroot' => $wwwroot);

	$module_id = $args['module_id'];
	$m = new Mustache_Engine();
#	echo $m->render('Hello, {{planet}}!', array('planet' => 'World'));
	#$response->getBody()->write("Hello, morea");
	$module = array_map(function($item) use($m, $env) {
		$item['content'] = $m->render($item['content'], $env);
		return $item;
	}, $morea->module($module_id));
	#$module = $morea->module($module_id);
	if ($module) {
		return $response->withJSON($module);
	} else {
		return $response->withJSON(['status' => 'Not Found', 'module_id' => $module_id], 404);
	}	
});
});


?>
