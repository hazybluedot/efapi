<?

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use Slim\Routing\RouteCollectorProxy as RouteCollectorProxy;

require_once('sqlHelpers.php');

$result_map = function($d) {
	return result_map($d);
};

$group->get('/quiz/activation', function (Request $request, Response $response, array $args) use($result_map) {
	$db = $request->getAttribute('efdb');
	$user = $request->getAttribute('user');

	$q = "SELECT qa.*, ss.desig, qus.starttime FROM `quiz_activation` qa LEFT JOIN `students` s ON qa.netid = s.username LEFT JOIN `sections` ss ON s.section = ss.num LEFT JOIN `quiz_setup` qs ON qs.shortname = qa.quiz LEFT JOIN `quiz_usersetup` qus ON qs.tid = qus.tid AND qa.netid = qus.netid WHERE ss.num > 0 GROUP BY host, netid, quiz";
	$data = $db->query($q, $result_map);

	if ($data) {
		return $response->withJSON($data);
	} else {
		return $response->withJSON(array("error" => "bad query", "q" => $q));
	}
});



?>
