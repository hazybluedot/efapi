<?

function identity_fun($item) { return $item; };

function result_map($rs, $func = 'identity_fun') {
	$data = [];
	while($item = $rs->fetch_array(MYSQLI_ASSOC)) {
		$data[] = $func($item);
	}
	return $data;
}

?>
