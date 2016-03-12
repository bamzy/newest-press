<?php

$result = array();

include 'conn.php';

$rs = mysql_query("select count(*) from category");
//if ($id == -1)
//    $rs = mysql_query("SELECT review.`id` AS id,reviewer.`name` AS reviewerName, `manuscript`.`title` AS manuscriptTitle, review.`reviewContent` AS reviewDescription, review.`finalDecision` AS finalDecision FROM review,reviewer,manuscript WHERE (review.`manuscriptId`=`manuscript`.`id` AND review.`reviewerId`=reviewer.`id`)");
//else
//    $rs = mysql_query("SELECT review.`id` AS id,reviewer.`name` AS reviewerName, `manuscript`.`title` AS manuscriptTitle, review.`reviewContent` AS reviewDescription, review.`finalDecision` AS finalDecision FROM review,reviewer,manuscript WHERE (`review`.`manuscriptId`=$id AND `review`.`manuscriptId`=`manuscript`.`id` AND review.`reviewerId`=reviewer.`id`)");
//$row = mysql_fetch_row($rs);
//$result["total"] = $row[0];
//if ($id == -1)
//    $rs = mysql_query("SELECT review.`id` AS id,reviewer.`name` AS reviewerName, `manuscript`.`title` AS manuscriptTitle, review.`reviewContent` AS reviewDescription, review.`finalDecision` AS finalDecision FROM review,reviewer,manuscript WHERE (review.`manuscriptId`=`manuscript`.`id` AND review.`reviewerId`=reviewer.`id`) limit $offset,$rows");
//else
//    $rs = mysql_query("SELECT review.`id` AS id,reviewer.`name` AS reviewerName, `manuscript`.`title` AS manuscriptTitle, review.`reviewContent` AS reviewDescription, review.`finalDecision` AS finalDecision FROM review,reviewer,manuscript WHERE (`review`.`manuscriptId`=$id AND `review`.`manuscriptId`=`manuscript`.`id` AND review.`reviewerId`=reviewer.`id`)  limit $offset,$rows");
$rs = mysql_query("select * from category");
$items = array();
while ($row = mysql_fetch_object($rs)) {
    array_push($items, $row);
}
//$result["rows"] = $items;

echo json_encode($items);
//echo "[{
//    \"id\":1,
//    \"categoryName\":\"text1\"
//},{
//    \"id\":2,
//    \"categoryName\":\"text2\"
//},{
//    \"id\":3,
//    \"categoryName\":\"text3\",
//    \"selected\":true
//},{
//    \"id\":4,
//    \"categoryName\":\"text4\"
//},{
//    \"id\":5,
//    \"categoryName\":\"text5\"
//}]"
?>