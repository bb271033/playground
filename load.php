<?php
define('ROOT_PATH', str_replace(dirname(__FILE__), '', __DIR__));

//$a = str_replace('\' ', '/', realpath(dirname(__FILE__))). '/';

include(ROOT_PATH.'settings/conn.php');

$database = new Database();
$conn = $database->getConnection();
$query = $conn->query("SELECT * FROM mb_transaction");

while($result = $query->fetch_object()){
	//$i++;
	$row[] = array(
		'id' => $result->id,
		'img' => 'data:image/png;base64, '.$result->img,
		'day' => $result->day,
		'details' => $result->detail,
		'trans' => $result->trans,
		'amount' => $result->amount,
		'path' => $result->path, 
		'type' => $result->type
	);
}

//echo count($row);