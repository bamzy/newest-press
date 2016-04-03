<?php
header('Content-Type: application/json');

$rest_json = file_get_contents("php://input");
$_POST = json_decode($rest_json, true);
$_POST = parse_str($rest_json, $parameters);

$aResult = array();
include './model/mysqlConnection.php';
if ($parameters['arguments']['0'] == null || $parameters['arguments']['1'] == null)
{
    echo('Wrong Parameters');
    die();
//    die('Wrong Parameters');
}
$query = "select * from tbl_review  where man_id = {$parameters['arguments']['0']} AND per_id = {$parameters['arguments']['1']}";
if (!$res = mysqlConnection::getConnection()->query($query)) {
    die('There was an error running the query [' . $query->error . ']');
}
if ($res->num_rows != 0) {
    echo('Already Exist');
//    die('Already Exist');
}


$query = "insert into tbl_review(per_id,man_id,rev_no,date_in,edreq_id,rec_id) VALUES ({$parameters['arguments']['1']},{$parameters['arguments']['0']},'1','" . date("Y-m-d H:i:s") . "',5,6)";
if (!$res = mysqlConnection::getConnection()->query($query)) {
    die('There was an error running the query [' . $query->error . ']');
}


echo json_encode(array(
    'id' => 3
));


?>


