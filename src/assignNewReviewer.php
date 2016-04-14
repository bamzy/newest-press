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
$query = "select * from tbl_editreq  where tbl_editreq.edreq_text= 'Unspecified'";
if (!$res = mysqlConnection::getConnection()->query($query)) {
    die('There was an error running the query [' . $query->error . ']');
}
$editreq_id = $res->fetch_assoc()['edreq_id'];
$query = "select * from tbl_rec  where tbl_rec.rec_text= 'Unspecified'";
if (!$res = mysqlConnection::getConnection()->query($query)) {
    die('There was an error running the query [' . $query->error . ']');
}
$rec_id = $res->fetch_assoc()['rec_id'];

$query = "select * from tbl_review  where man_id = {$parameters['arguments']['0']} AND per_id = {$parameters['arguments']['1']}";
if (!$res = mysqlConnection::getConnection()->query($query)) {
    die('There was an error running the query [' . $query->error . ']');
}
if ($res->num_rows != 0) {
    echo json_encode(array('errorMsg' => 'Already assigned'));
    die();
}


$query = "insert into tbl_review(per_id,man_id,rev_no,date_in,edreq_id,rec_id) VALUES ({$parameters['arguments']['1']},{$parameters['arguments']['0']},'1','" . date("Y-m-d H:i:s") . "',{$editreq_id},{$rec_id})";
if (!$res = mysqlConnection::getConnection()->query($query)) {
    die('There was an error running the query [' . $query->error . ']');
}


echo json_encode(array(
    'id' => 3
));


?>


