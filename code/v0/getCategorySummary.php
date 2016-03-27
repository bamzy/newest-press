<?php

$result = array();


include './model/conn.php';


$query = "select * from tbl_category";
if (!$res = $conn->query($query)) {
    die('There was an error running the query [' . $query->error . ']');
}

$items = array();
while ($row = $res->fetch_assoc()) {
    array_push($items, $row);
}

echo json_encode($items);

?>