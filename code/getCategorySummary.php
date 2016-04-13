<?php

$result = array();


include './model/mysqlConnection.php';


$query = "select * from tbl_category";
if (!$res = mysqlConnection::getConnection()->query($query)) {
    die('There was an error running the query [' . $query->error . ']');
}

$items = array();
while ($row = $res->fetch_assoc()) {
    array_push($items, $row);
}

echo json_encode($items);

?>