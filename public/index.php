<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

include("Morea/Morea.php");

require __DIR__ . '/../vendor/autoload.php';

$morea_dir = '/home/dmaczka/Sites/EF105/master/src/morea';

$app = AppFactory::create();
#$app->setBasePath('/ef105-2019-08/api');

$app->options('/{routes:.+}', function ($request, $response, $args) {
    return $response;
});


#$app->add(function ($req, $res, $next) {
#    $response = $next($req, $res);
#    return $response
#            ->withHeader('Access-Control-Allow-Origin', 'http://mysite')
#            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
#            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
#});

$app->get('/', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Hello world!");
    return $response;
});

$app->get('/morea/modules/', function(Request $request, Response $response, array $args)
    use ($morea_dir) {
        $morea = new Morea($morea_dir);
        #$response->getBody()->write(json_encode($morea->modules()));
        #return $response->withStatus(200);
        #$response = $response->withHeader('Access-Control-Allow-Origin', '*');
        header("Access-Control-Allow-Origin: *");
        return $response->withJSON($morea->modules())
            ->withHeader('Access-Control-Allow-Origin', '*')
            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization');
    });

$app->get('/morea/modules/{module_id}',
          function(Request $request, Response $response, array $args) use ($morea_dir) {
              global $wwwroot;
              
              $env = array('wwwroot' => $wwwroot);

              $module_id = $args['module_id'];
              $morea = new Morea($morea_dir);
              $m = new Mustache_Engine();
              #	echo $m->render('Hello, {{planet}}!', array('planet' => 'World'));
              #$response->getBody()->write("Hello, morea");
              $module = array_map(function($item) use($m, $env) {
                  $item['content'] = $m->render($item['content'], $env);
                  return $item;
              }, $morea->module($module_id));
              #$module = $morea->module($module_id);
              if ($module) {
                  return $response
                      ->withJSON($module)
                      ->withHeader('Access-Control-Allow-Origin', '*')
                      ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization');
              } else {
                  return $response->withJSON(['status' => 'Not Found', 'module_id' => $module_id], 404);
              }	
          });

$app->get('/{file}', function(Request $request, Response $response, array $args) {
    $file = '/home/dmaczka/workspace/moreajs/public/' . $args['file'];
    $contents = file_get_contents($file);
    $response->getBody()->write($contents);
    return $response;
});

$app->group('/ef105-2019-08/api/morea', function () use ($app) {
	$app->get('/modules/', function(Request $request, Response $response, array $args) {
		$response->getBody()->write("Hello, morea");
		return $response;
	});
});

$app->run();
?>
