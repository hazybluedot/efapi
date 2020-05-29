<?php

#http_response_code(202);
#header('Content-Type: application/json');
#$data = array("greetings"=> "Hello world!");
#echo json_encode($data);
#die;

#ini_set('display_errors',1); error_reporting(E_ALL);


//include('local.inc.php');

#error_log("In the slim index.php\n", 3, "/var/log/httpd/slim.log");
#error_log("In the slim index.php\n");

require 'vendor/autoload.php';

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use Slim\Routing\RouteCollectorProxy as RouteCollectorProxy;
use Slim\Factory\AppFactory;

require_once('inc/ef_middleware.php');
require_once('config.inc.php');

$app = AppFactory::create();

$app->addBodyParsingMiddleware();

//TODO: for production do not put raw error message in response
$customErrorHandler = function(Request $request, $exception, bool $displayErrorDetails, bool $logErrors, bool $logErrorDetails) use ($app) {
		error_log($exception);
		$data = [
			'message' =>  $exception->getMessage(),
			'request' => $request->getUri()->getPath()
		];
		$response = $app->getResponseFactory()->createResponse();
		return $response->withJSON($data);
};

$app->addRoutingMiddleware();
$errorMiddleware = $app->addErrorMiddleware(true, true, true);
$errorMiddleware->setDefaultErrorHandler($customErrorHandler);

$app->add($efclass_mw);
$app->add(function($request, $handler) {
	$response = $handler->handle($request);
    return $response
            ->withHeader('Access-Control-Allow-Origin', '*')
            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');	
});

$app->setBasePath($API_BASEPATH);


$app->group('', function(RouteCollectorProxy $group)  {
	require_once('sqlHelpers.php');

    $group->get('/env', function(Request $request, Response $response, array $args) {
        $user = $request->getAttribute('user');
        $classconfig = $request->getAttribute('classconfig');
        
        return $response->withJSON(array('user'=>$user, 'wwwroot' => $classconfig['wwwroot'], 'classid' => $classconfig['classid']));
    });

    require('routes/morea.php');
	require('routes/dropbox.php');
	require('routes/sections.php');
	require('routes/grades.php');
	require('routes/quiz_activation.php');
	require('routes/assignments.php');
	//require('routes/response-questions.php');
})->add(new EFDbMiddleware($group));

$app->run();

?>
