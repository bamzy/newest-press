<?php
$rest_json = file_get_contents("php://input");
$_POST = json_decode($rest_json, true);
$_POST = parse_str($rest_json, $parameters);

$page = isset($parameters['page']) ? intval($parameters['page']) : 1;
$rows = isset($parameters['rows']) ? intval($parameters['rows']) : 11;
$id = isset($parameters['id']) ? intval($parameters['id']) : -1;
$offset = ($page - 1) * $rows;
$result = array();
$authorRoleId = 1;


include './model/mysqlConnection.php';

$query = "select *  from tbl_people where role_id = {$authorRoleId}";
if (!$res = mysqlConnection::getConnection()->query($query)) {
    die('There was an error running the query [' . $query->error . ']');
}
$result["total"] = $res->num_rows;
//$rs = mysql_query($query);

$query = "select * from tbl_people where role_id = {$authorRoleId} limit $offset,$rows";
if (!$res = mysqlConnection::getConnection()->query($query)) {
    die('There was an error running the query [' . $query->error . ']');
}
//$result["total"] = $res->num_rows;
$items = array();
while ($row = $res->fetch_assoc()) {
    array_push($items, $row);
}
$result["rows"] = $items;

echo json_encode($result);
?>






