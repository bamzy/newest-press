<?php
$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
$id = isset($_POST['id']) ? intval($_POST['id']) : -1;
$offset = ($page - 1) * $rows;
$result = array();


include './model/conn.php';

if ($id == -1)
    return null;
else
    $query = "SELECT review.`id` AS id,reviewer.`name` AS reviewerName, `manuscript`.`title` AS manuscriptTitle, review.`reviewContent` AS reviewDescription, review.`finalDecision` AS finalDecision ,review.`assignmentDate` AS assignmentDate , review.`decisionDate` AS decisionDate FROM review,reviewer,manuscript WHERE (`review`.`manuscriptId`=$id AND `review`.`manuscriptId`=`manuscript`.`id` AND review.`reviewerId`=reviewer.`id`)";
if (!$res = $conn->query($query)) {
    die('There was an error running the query [' . $query->error . ']');
}
$result["total"] = $res->fetch_assoc();
if ($id == -1)
    $query = "SELECT review.`id` AS id,reviewer.`name` AS reviewerName, `manuscript`.`title` AS manuscriptTitle, review.`reviewContent` AS reviewDescription, review.`finalDecision` AS finalDecision ,review.`assignmentDate` AS assignmentDate , review.`decisionDate` as decisionDate FROM review,reviewer,manuscript WHERE (review.`manuscriptId`=`manuscript`.`id` AND review.`reviewerId`=reviewer.`id`) limit $offset,$rows";
else
    $query = "SELECT review.`id` AS id,reviewer.`name` AS reviewerName, `manuscript`.`title` AS manuscriptTitle, review.`reviewContent` AS reviewDescription, review.`finalDecision` AS finalDecision ,review.`assignmentDate` AS assignmentDate , review.`decisionDate` as decisionDate FROM review,reviewer,manuscript WHERE (`review`.`manuscriptId`=$id AND `review`.`manuscriptId`=`manuscript`.`id` AND review.`reviewerId`=reviewer.`id`)  limit $offset,$rows";
if (!$res = $conn->query($query)) {
    die('There was an error running the query [' . $query->error . ']');
}
$items = array();
while ($row = $res->fetch_assoc()) {
    array_push($items, $row);
}
$result["rows"] = $items;

echo json_encode($result);


?>