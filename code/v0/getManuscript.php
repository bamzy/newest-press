<?php
$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
$offset = ($page - 1) * $rows;
$result = array();

include './model/conn.php';

$query = "select count(*) from tbl_manuscript";
if(!$res = $conn->query($query)){
    die('There was an error running the query [' . $query->error . ']');
}
//$rs = mysql_query($query);
$result["total"] = $res->fetch_assoc();

$query = "SELECT CONCAT(tbl_people.`fname`,' ',`tbl_people`.`lname`) AS authorName, tbl_status.`stat_text` AS `status`, tbl_manuscript.`dateSubmitted` AS dateSubmitted , tbl_manuscript.`dateStatus` AS dateStatus , tbl_manuscript.`title_orig` AS title , tbl_manuscript.`genre` AS category ,tbl_manuscript.`notes` AS notes FROM tbl_manuscript, tbl_status, tbl_rec, tbl_people WHERE `tbl_manuscript`.`stat_id`= `tbl_status`.`stat_id` AND `tbl_manuscript`.`per_id` = `tbl_people`.`per_id`  limit $offset,$rows";
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