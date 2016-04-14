<?php
$rest_json = file_get_contents("php://input");
$_POST = json_decode($rest_json, true);
$_POST = parse_str($rest_json, $parameters);

$page = isset($parameters['page']) ? intval($parameters['page']) : 1;
$rows = isset($parameters['rows']) ? intval($parameters['rows']) : 11;
$id = isset($parameters['id']) ? intval($parameters['id']) : -1;
$offset = ($page - 1) * $rows;
$result = array();

include './model/mysqlConnection.php';

$query = "select * from tbl_manuscript where active='Y'";
if (!$res = mysqlConnection::getConnection()->query($query)) {
    die('There was an error running the query [' . $query->error . ']');
}
//$rs = mysql_query($query);
$result["total"] = $res->num_rows;

$query = "SELECT DISTINCT tbl_manuscript.man_id AS id, CONCAT(tbl_people.`fname`,' ',tbl_people.`lname`) AS authorName, tbl_status.`stat_text` AS `status`, tbl_manuscript.`dateSubmitted` AS dateSubmitted , tbl_manuscript.`dateStatus` AS dateStatus , tbl_manuscript.`title_orig` AS title , tbl_manuscript.`genre` AS category ,tbl_manuscript.`notes` AS notes, tbl_doc.`doc_filename`AS downloadLink FROM tbl_manuscript, tbl_status, tbl_rec, tbl_people,tbl_doc WHERE `tbl_manuscript`.`active`= 'Y' AND `tbl_manuscript`.`stat_id`= `tbl_status`.`stat_id` AND `tbl_manuscript`.`per_id` = `tbl_people`.`per_id` AND `tbl_doc`.`man_id` = `tbl_manuscript`.`man_id` ORDER  BY tbl_manuscript.`man_id` DESC limit $offset,$rows";
//$query = "SELECT DISTINCT tbl_manuscript.man_id AS id, CONCAT(tbl_people.`fname`,' ',tbl_people.`lname`) AS authorName, tbl_status.`stat_text` AS `status`, tbl_manuscript.`dateSubmitted` AS dateSubmitted , tbl_manuscript.`dateStatus` AS dateStatus , tbl_manuscript.`title_orig` AS title , tbl_manuscript.`genre` AS category ,tbl_manuscript.`notes` AS notes, `tbl_doc`.`doc_filename` AS downloadLink FROM tbl_manuscript, tbl_status, tbl_rec, tbl_people,tbl_doc WHERE `tbl_manuscript`.`stat_id`= `tbl_status`.`stat_id` AND `tbl_manuscript`.`per_id` = `tbl_people`.`per_id` AND `tbl_doc`.`man_id` = `tbl_manuscript`.`man_id`  limit $offset,$rows";
//$query = "SELECT DISTINCT tbl_manuscript.man_id AS id, CONCAT(`tbl_people`.`fname`,' ',`tbl_people`.`lname`) AS authorName, tbl_status.`stat_text` AS `status`, tbl_manuscript.`dateSubmitted` AS dateSubmitted , tbl_manuscript.`dateStatus` AS dateStatus , tbl_manuscript.`title_orig` AS title , tbl_manuscript.`genre` AS category ,tbl_manuscript.`notes` AS notes, CONCAT('aaa' ,tbl_doc.`doc_filename`, 'bbb') AS downloadLink FROM tbl_manuscript, tbl_status, tbl_rec, tbl_people,tbl_doc WHERE `tbl_manuscript`.`stat_id`= `tbl_status`.`stat_id` AND `tbl_manuscript`.`per_id` = `tbl_people`.`per_id` AND `tbl_doc`.`man_id` = `tbl_manuscript`.`man_id` limit $offset,$rows";
if (!$res = mysqlConnection::getConnection()->query($query)) {
    die('There was an error running the query [' . $query->error . ']');
}

$items = array();
while ($row = $res->fetch_assoc()) {
    $row['downloadLink'] = "<a href=\"./download.php?fileName=" . $row['downloadLink'] . "\">Click Here </a>";
    array_push($items, $row);
}
$result["rows"] = $items;

echo json_encode($result);
//print_r ($result);

?>