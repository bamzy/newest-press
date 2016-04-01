<?php
header('Content-Type: application/json');

$rest_json = file_get_contents("php://input");
$_POST = json_decode($rest_json, true);
$_POST = parse_str($rest_json, $parameters);

$aResult = array();
include './model/conn.php';
if ($parameters['arguments']['0'] == null) {
    echo('Wrong Parameters');
    die();
//    die('Wrong Parameters');
}
$query = "UPDATE  tbl_people SET notify = 'Yes' where per_id = {$parameters['arguments']['0']}";
if (!$res = $conn->query($query)) {
    die('There was an error running the query [' . $query->error . ']');
}


echo json_encode(array(
    'id' => 3
));


?>


