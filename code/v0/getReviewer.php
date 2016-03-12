<?php
$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
$offset = ($page - 1) * $rows;
$result = array();

//include 'conn.php';
//
//$rs = mysql_query("select count(*) from reviewer");
//$row = mysql_fetch_row($rs);
//$result["total"] = $row[0];
//$rs = mysql_query("select * from reviewer limit $offset,$rows");
//
//$items = array();
//while ($row = mysql_fetch_object($rs)) {
//    array_push($items, $row);
//}
//$result["rows"] = $items;
//
//echo json_encode($result);

include './model/conn.php';

$query = "select count(*) from reviewer";
if(!$res = $conn->query($query)){
    die('There was an error running the query [' . $query->error . ']');
}
//$rs = mysql_query($query);
$result["total"] = $res->fetch_assoc();

$query = "select * from reviewer limit $offset,$rows";
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