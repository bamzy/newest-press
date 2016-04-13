<?php

//$rest_json = file_get_contents("php://input");
//$_POST = json_decode($rest_json, true);
//$_POST = parse_str($rest_json, $parameters);
//
//$page = isset($parameters['page']) ? intval($parameters['page']) : 1;
//$rows = isset($parameters['rows']) ? intval($parameters['rows']) : 11;
//$id = isset($parameters['id']) ? intval($parameters['id']) : -1;
//$mode = isset($parameters['']) ? intval($parameters['id']) : -1;
//$offset = ($page - 1) * $rows;
//$result = array();
$editorRoleId = 3;
$result = array();


include './model/mysqlConnection.php';

if ($_GET['mode'] == "notified_disabled")
    $query = "select concat(fname,' ',lname) AS editorName, per_id AS per_id , email AS email from tbl_people where role_id = {$editorRoleId} AND notify = 'No'";
if ($_GET['mode'] == "notified_enabled")
    $query = "select concat(fname,' ',lname) AS editorName, per_id AS per_id , email AS email from tbl_people where role_id = {$editorRoleId} AND notify = 'Yes'";
if (!$res = mysqlConnection::getConnection()->query($query)) {
    die('There was an error running the query [' . $query->error . ']');
}
$result["total"] = $res->num_rows;
$items = array();
while ($row = $res->fetch_assoc()) {
    array_push($items, $row);
}
$result["rows"] = $items;

echo json_encode($result);


?>