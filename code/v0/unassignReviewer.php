<?php
header('Content-Type: application/json');

$rest_json = file_get_contents("php://input");
$_POST = json_decode($rest_json, true);
$_POST = parse_str($rest_json, $parameters);

$aResult = array();
include './model/mysqlConnection.php';
if ($parameters['arguments']['0'] == null) {
    echo('Wrong Parameters');
    die();
}

$query = "DELETE from tbl_review where rev_id = {$parameters['arguments']['0']}";
if (!$res = mysqlConnection::getConnection()->query($query)) {
    die('There was an error running the query [' . $query->error . ']');
}


echo json_encode(array(
    'id' => 3
));


?>

