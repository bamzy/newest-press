<?php
$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
$offset = ($page - 1) * $rows;
$result = array();
$reviewerRoleId = 1;


include './model/conn.php';

$query = "select count(*) from tbl_people where role_id = {$reviewerRoleId}";
if(!$res = $conn->query($query)){
    die('There was an error running the query [' . $query->error . ']');
}
//$rs = mysql_query($query);
$result["total"] = $res->fetch_assoc();

$query = "select * from tbl_people where role_id = {$reviewerRoleId} limit $offset,$rows";
if(!$res = $conn->query($query)){
    die('There was an error running the query [' . $query->error . ']');
}

$items = array();
while ($row = $res->fetch_assoc()) {
    array_push($items, $row);
}
$result["rows"] = $items;

echo json_encode($result);


?>