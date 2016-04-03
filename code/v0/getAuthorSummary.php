<?php

$result = array();


include './model/mysqlConnection.php';


$query = "select per_id as id, concat(fname,' ',lname) as authorName from tbl_people where role_id = '1'";
if (!$res = mysqlConnection::getConnection()->query($query)) {
    die('There was an error running the query [' . $query->error . ']');
}

$items = array();
while ($row = $res->fetch_assoc()) {
    array_push($items, $row);
}

echo json_encode($items);

?>