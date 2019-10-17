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

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use Slim\Routing\RouteCollectorProxy as RouteCollectorProxy;
use Slim\Factory\AppFactory;


require 'vendor/autoload.php';
$nooutput=TRUE;
include("/www/c/sys/28/inc/header.inc.php");

function efdb_mw(Request $request, RequestHandler $handler) {
	
}

function main() {
	$app = AppFactory::create();

	$customErrorHandler = function(Request $request, $exception, bool $displayErrorDetails, bool $logErrors, bool $logErrorDetails) use ($app) {
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

	$app->setBasePath('/ef105-2019-08/api');


require('routes/morea.php');

$app->group('', function(RouteCollectorProxy $group) {
	require('routes/dropbox.php');
	require('routes/sections.php');
})->add('efdb_mw');


$app->get('/assignments/', function (Request $request, Response $response, array $args) {
	global $GBO;
	$q = "SELECT title,time_start,time_1,time_2,time_3,time_4,time_5,time_end,time_weights FROM quiz_setup";
	if ($rs = $GBO->query($q)) {
		$res_data = [];
		while ($data = $rs->fetch_array(MYSQLI_ASSOC)) {
			$data['type'] = 'quiz';
			$res_data[] = $data;
		}
		return $response->withJSON($res_data);
#array('num_results' => count($res_data), 'results' => $res_data));
	} else {
		$response->status(404);
		$response->getBody()->write("Server error: query failed");
	}
	return $response;
});

function identity_fun($item) { return $item; };

function result_map($rs, $func = 'identity_fun') {
	$data = [];
	while($item = $rs->fetch_array(MYSQLI_ASSOC)) {
		$data[] = $func($item);
	}
	return $data;
}

require('routes/grades.php');

$app->get('/quiz/activation', function (Request $request, Response $response, array $args) {
	global $GBO;
	$q = "SELECT qa.*, ss.desig, qus.starttime FROM `quiz_activation` qa 
	LEFT JOIN `students` s ON qa.netid = s.username
    LEFT JOIN `sections` ss ON s.section = ss.num
    LEFT JOIN `quiz_setup` qs ON qs.shortname = qa.quiz
    LEFT JOIN `quiz_usersetup` qus ON qs.tid = qus.tid AND qa.netid = qus.netid WHERE ss.num > 0
	GROUP BY host, netid, quiz";
	if ($rs = $GBO->query($q)) {
		$data = result_map($rs);
		return $response->withJSON($data);
	} else {
		return $response->withJSON(array("error" => "bad query"));
	}
});


#echo $_SERVER['REQUEST_URI'];
$app->run();
}

?>
