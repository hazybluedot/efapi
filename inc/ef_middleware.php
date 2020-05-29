<?
//use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
//use Slim\Psr7\Response;

require 'db.php';

$use_sane_classconfig=true;
require_once('/www/c/ef105-2020-08/inc/classconfig.inc.php');

session_name($CLASS_CONFIG['sessionname']);
session_start();

class EFDbMiddleware {
	private $app = null;

	function __construct($app) {
		$this->$app = $app;
	}

	public function __invoke(Request $request, RequestHandler $handler) {
	
		$user = $_SESSION["user"] ? $_SESSION["user"] : array("priv" => "anonymous", "username" => null, "show" => 0);

		$dbuser = $dbname = ini_get("mysqli.default_user"); 
		$dbhost = ini_get("mysqli.default_host"); # "localhost";
		$dbpwd = ini_get("mysqli.default_pw");
		$efdb = new EFDB($dbhost, $dbuser, $dbpwd, $dbname);
	
		if ($efdb->connect_error) {
			error_log($efdb->connect_error);
			$data = ['error' => 'could not connect to database'];
			$response = $this->app->getResponseFactory()->createResponse();
			$response->getBody()->write(json_encode($data));
			return $response->withHeader('Content-Type', 'application/json');
		}

		$request = $request
			->withAttribute('user', $user)
			->withAttribute('efdb', $efdb)
			->withAttribute('dbname', $dbname);
	
        
		$response = $handler->handle($request);

        //TODO: could potentially put access control logic here
        //not really, because it will depend on endpoint
        //$existingBody = $response->getBody();
        //$response->getBody()->write(json_encode($user));
        //$response = new Response();
        //$response->getBody()->write('{"user": ' . json_encode($user) . ','."\n". '"payload": ' . $existingBody . '}');
        //return $response->withHeader('Content-type', 'application/json');
        return $response;
	}	
}

$efclass_mw = function(Request $request, RequestHandler $handler) use ($app, $CLASS_CONFIG) {
	$request = $request->withAttribute('classconfig', $CLASS_CONFIG);
	return $handler->handle($request);
};

?>
