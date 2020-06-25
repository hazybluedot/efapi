<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use Slim\Routing\RouteCollectorProxy as RouteCollectorProxy;

$group->get('/sections/', function (Request $request, Response $response, array $args) {
	$db = $request->getAttribute('efdb');
	$dbname = $request->getAttribute('dbname');
	/* The View Query
	/*$q = "SELECT section, sec.room1_cap as room_cap, 
	COUNT(section) as enrolled, sec.desig, sec.time1, 
	sec.room1, sec.ta1, p.last, p.first 
	FROM students stu 
	LEFT JOIN sections sec ON sec.num = stu.section AND (stu.lgradeabs is NULL or stu.lgradeabs='') 
	LEFT JOIN people p ON p.username = sec.ta1 
	GROUP BY stu.section";*/
	$q = "SELECT * FROM `section_info` WHERE section > 0;";
	$q = "SELECT S.num AS section,S.room1_cap AS room_cap,S.desig,S.time1,S.room1,S.ta1,P.last,P.first  FROM `sections` AS S LEFT JOIN `people` AS P ON S.ta1 = P.username";
	$res_data = $db->query($q, function($rs) use($dbname) {
		$res_data = [];
		while ($data = $rs->fetch_object()) {
			$time_match = [];
			preg_match('/([0-9]{1,2}:[0-9]{1,2})-([0-9]{1,2}:[0-9]{1,2})\s+([TR]+)/', $data->time1, $time_match); 
			$res_data[] = array(
				"section" => $data->section,
				"designation" => $data->desig,
				"room" => array("location" => $data->room1, "capacity" => intval($data->room_cap)),
				"time" => array("string" => $data->time1,
								"begin" => $time_match[1],
								"end" => $time_match[2],
								"days" => $time_match[3]),
				"tas" => array(array("netid" => $data->ta1, "name1" => $data->first, "name2" => $data->last)),
				"enrolled" => intval($data->enrolled)
			);
		}
		return $res_data;
		//return ['dbname' => $dbname, 'sections' => $res_data];
	});

	if ($res_data) {
		$response = $response->withJSON($res_data);
	} else {
		$response = $response->withStatus(500);	
		$response->getBody()->write("Could not execute query: " . $q . "\nmysql error: " . $db->error);
	}
	return $response;
});



?>
