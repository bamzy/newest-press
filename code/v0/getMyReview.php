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

if ($id == -1 || $id == null) {
    $id = isset($_REQUEST['per_id']) ? intval($_REQUEST['per_id']) : -1;
    if ($id == -1 || $id == null)
        return null;
}

$query = "SELECT DISTINCT `tbl_review`.`rev_id` ,CONCAT(tbl_people.`fname`,' ',tbl_people.`lname`) AS reviewer, tbl_rec.`rec_text` AS currentStat , tbl_review.`date_in` AS dateIn , tbl_review.`date_rec` AS dateRec , tbl_review.`comments` AS `comment`  FROM tbl_review, tbl_people, tbl_rec , tbl_editreq, tbl_manuscript WHERE tbl_review.`per_id` = tbl_people.`per_id` AND
tbl_review.`rec_id` = tbl_rec.`rec_id` AND tbl_review.`edreq_id` = tbl_editreq.`edreq_id` AND tbl_review.`per_id` = {$id}";
if (!$res = mysqlConnection::getConnection()->query($query)) {
    die('There was an error running the query [' . $query->error . ']');
}
$result["total"] = $res->num_rows;

//    $query = "SELECT review.`id` AS id,reviewer.`name` AS reviewerName, `manuscript`.`title` AS manuscriptTitle, review.`reviewContent` AS reviewDescription, review.`finalDecision` AS finalDecision ,review.`assignmentDate` AS assignmentDate , review.`decisionDate` as decisionDate FROM review,reviewer,manuscript WHERE (`review`.`manuscriptId`=$id AND `review`.`manuscriptId`=`manuscript`.`id` AND review.`reviewerId`=reviewer.`id`)  limit $offset,$rows";
$query = "SELECT DISTINCT `tbl_review`.`rev_id` ,CONCAT(tbl_people.`fname`,' ',tbl_people.`lname`) AS reviewer, tbl_rec.`rec_text` AS currentStat , tbl_review.`date_in` AS dateIn , tbl_review.`date_rec` AS dateRec , tbl_review.`comments` AS `comment`  FROM tbl_review, tbl_people, tbl_rec , tbl_editreq, tbl_manuscript WHERE tbl_review.`per_id` = tbl_people.`per_id` AND
tbl_review.`rec_id` = tbl_rec.`rec_id` AND tbl_review.`edreq_id` = tbl_editreq.`edreq_id` AND tbl_review.`per_id` = {$id}  limit $offset,$rows";
if (!$res = mysqlConnection::getConnection()->query($query)) {
    die('There was an error running the query [' . $query->error . ']');
}
$items = array();
while ($row = $res->fetch_assoc()) {
    array_push($items, $row);
}
$items;

?>

<table class="dv-table" border="0" style="width:100%;">
    <tr>
        <td rowspan="3" style="width:60px">
            <?php
            $aa = explode('-', $id);
            $serno = $aa[1];
            $img = "./images/newestpress-logo.png";
            echo "<img src=\"$img\" style=\"width:60px;margin-right:20px\" />";
            ?>
        </td>
        <td class="dv-label">Item ID:</td>
        <td><?php echo $item['rev_id']; ?></td>
        <td class="dv-label">Product ID:</td>
        <td><?php echo $item['reviewer']; ?></td>
    </tr>
    <tr>
        <td class="dv-label">List Price:</td>
        <td><?php echo $item['currentStat']; ?></td>
        <td class="dv-label">Unit Cost:</td>
        <td><?php echo $item['currentStat']; ?></td>
    </tr>
    <tr>
        <td class="dv-label">Attribute:</td>
        <td colspan="3"><?php echo $item['attr1']; ?></td>
    </tr>
</table>

