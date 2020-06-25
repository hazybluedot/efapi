<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

$group->get('/grades/', function (Request $request, Response $response, array $args) {
	$db = $request->getAttribute('efdb');
	$user = $request->getAttribute('user');

	$q = "SELECT * FROM `gradeitems`";
	if ($rs = $db->query($q)) {
		$data = result_map($rs);
	}
	return $response;
});

$group->get('/grades/{shortname}', function (Request $request, Response $response, array $args) {
	$db = $request->getAttribute('efdb');
	$user = $request->getAttribute('user');

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
