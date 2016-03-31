<?php

//$rest_json = file_get_contents("php://input");
//$_POST = json_decode($rest_json, true);
//$_POST = parse_str($rest_json, $parameters);
//
//$page = isset($parameters['page']) ? intval($parameters['page']) : 1;
//$rows = isset($parameters['rows']) ? intval($parameters['rows']) : 11;
//$id = isset($parameters['id']) ? intval($parameters['id']) : -1;
//$mode = isset($parameters['']) ? intval($parameters['id']) : -1;
//$offset = ($page - 1) * $rows;
//$result = array();
$reviewerRoleId = 2;


include './model/conn.php';

//$query = "select *  from tbl_people where role_id = {$reviewerRoleId}";
//if(!$res = $conn->query($query)){
//    die('There was an error running the query [' . $query->error . ']');
//}
//$result["total"] = $res->num_rows;
//$rs = mysql_query($query);
//if ($parameters['mode'] == 'all')
//    $query = "select * from tbl_people where role_id = {$reviewerRoleId} ";
//else
$query = "select concat(fname,' ',lname) AS authorName, per_id AS per_id, street AS street   from tbl_people where role_id = {$reviewerRoleId}";
if (!$res = $conn->query($query)) {
    die('There was an error running the query [' . $query->error . ']');
}
//$result["total"] = $res->num_rows;
$items = array();
while ($row = $res->fetch_assoc()) {
    array_push($items, $row);
}
$result["rows"] = $items;

echo json_encode($result);


?>