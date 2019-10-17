<?
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

$app->get('/grades/', function (Request $request, Response $response, array $args) {
	global $GBO;
	$q = "SELECT * FROM `gradeitems`";
	if ($rs = $GBO->query($q)) {
		$data = result_map($rs);
	}
	return $response;
});

$app->get('/grades/{shortname}', function (Request $request, Response $response, array $args) {
	global $GBO;
	$shortname = $args['shortname'];
	$q = "SELECT * FROM `latest_grades` WHERE gi LIKE '$shortname%'";
	if (!($_SESSION['privs']['admin'] || $_SESSION['privs']['ta'])) {
		#$response->status(403);
		return $response->withJSON(array("error" => array("status" => 403, "reason" => "permission denied")));
		
	}
	if ($rs = $GBO->query($q)) {
		$grades = [];
		while($data = $rs->fetch_array(MYSQLI_ASSOC)) {
			$data['grade'] = !is_null($data['grade']) ? floatval($data['grade']) : null;
			$grades[] = $data;
		}
		return $response->withJSON($grades);
	} else {
		$response->status(404);
		$response->getBody()->write("$q: query failed");
	}
	return $response;
});

?>
