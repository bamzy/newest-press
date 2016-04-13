<?php
include_once('./model/mysqlConnection.php');
$rest_json = file_get_contents("php://input");
$_POST = json_decode($rest_json, true);
$_POST = parse_str($rest_json, $parameters);
session_start();
include 'manutrack.php'; 
connect();

$revid = $parameters['revid'];
$edreqid = $parameters['edreqid'];
$recid = $parameters['recid'];


$user = $_SESSION['user'];


// get reccomendation text
$query = "SELECT * FROM tbl_rec";
$res = mysqlConnection::getConnection()->query($query);
while ($arr_rec = $res->fetch_assoc()) {
	$rec_text[] = $arr_rec['rec_text'];
}
//print_r($rec_text);
echo $rec_text[$recid-1];
$body_rec = $rec_text[$recid-1];



// get editing requirement
$query = "SELECT * FROM tbl_editreq";
$res = mysqlConnection::getConnection()->query($query);
while ($arr_rec = $res->fetch_assoc()) {
	$edreq_text[] = $arr_rec['edreq_text'];
}
//print_r($edreq_text);
echo $edreq_text[$edreqid-1];
$body_edreq = $edreq_text[$edreqid-1];



?>
