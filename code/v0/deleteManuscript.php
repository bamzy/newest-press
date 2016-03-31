<?php

$rest_json = file_get_contents("php://input");
$_POST = json_decode($rest_json, true);
$_POST = parse_str($rest_json, $parameters);

include './model/conn.php';

$query = "delete from tbl_doc where man_id = '{$parameters['id']}' ";
if (!$res = $conn->query($query)) {
    echo json_encode(array('errorMsg' => "{$query->error}"));
    die('There was an error running the query [' . $query->error . ']');
}

$query = "delete from tbl_manuscript where man_id = '{$parameters['id']}' ";
if (!$res = $conn->query($query)) {
    echo json_encode(array('errorMsg' => "{$query->error}"));
    die('There was an error running the query [' . $query->error . ']');
}
//$result = @mysql_query($sql);
//if ($result) {
else echo json_encode(array('success' => true));

//} else {

?>