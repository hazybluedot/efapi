<?
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use Slim\Routing\RouteCollectorProxy as RouteCollectorProxy;

$group->group('/dropbox', function(RouteCollectorProxy $group) {
	$group->get('/dropbox', function(Request $request, Response $response, array $args) {
		return $response->withJSON(array("dbitems" => array(1,2,3,4,5)));
	}); 
	$group->get('/index', function(Request $request, Response $response, array $args) {
		return $response->withJSON(array("index" => array(1,2,3,4,5)));
	}); 
})->add(function (Request $request, RequestHandler $handler) use($app) {
	$response = $handler->handle($request);
	$data = json_decode($response->getBody());
	$data->middleware = 'got you some middleware';
	
	$response = $app->getResponseFactory()->createResponse();
	$response->getBody()->write(json_encode($data));
	return $response->withHeader('Content-Type', 'application/json');
});

?>
