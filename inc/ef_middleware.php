<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;

require 'db.php';

$use_sane_classconfig=true;

if (!isset($CLASS_CONFIG) && isset($CLASS_CONFIG_PATH) && file_exists($CLASS_CONFIG_PATH)) {
    require_once($CLASS_CONFIG_PATH);
}

class EFDbMiddleware {
    private $user;

    public function __construct($user) {
        $this->user = $user;
        //file_put_contents("php://stdout", "\nEFDbMiddleware user: " . serialize($this->user));
    }

	public function __invoke(Request $request, RequestHandler $handler): Response {
        $dbuser = $dbname = ini_get("mysqli.default_user"); 
		$dbhost = ini_get("mysqli.default_host"); # "localhost";
		$dbpwd = ini_get("mysqli.default_pw");
		$efdb = new EFDB($dbhost, $dbuser, $dbpwd, $dbname);
        
        if ($efdb->connect_error) {
			error_log("DB connection error: " . $efdb->connect_error);
            throw(new RuntimeException("Cound not connect to database"));
		}

        //file_put_contents("php://stdout", "\nEFDbMiddleware request->withAttribute('user'): " . serialize($this->user));
		$request = $request
			->withAttribute('user', $this->user)
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

$efclass_mw = function(Request $request, RequestHandler $handler) use ($CLASS_CONFIG) {
	$request = $request->withAttribute('classconfig', $CLASS_CONFIG);
	return $handler->handle($request);
};

?>
