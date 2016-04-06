<?php


$rest_json = file_get_contents("php://input");
$_POST = json_decode($rest_json, true);
$_POST = parse_str($rest_json, $parameters);

include './model/mysqlConnection.php';

$query = "update tbl_people set fname='{$parameters['fname']}',lname='{$parameters['lname']}',phone='{$parameters['phone']}',email='{$parameters['email']}',city='{$parameters['city']}',street='{$parameters['street']}',province='{$parameters['province']}' where per_id={$parameters['per_id']}";
if (!$res = mysqlConnection::getConnection()->query($query)) {
    die('There was an error running the query [' . $query->error . ']');
    echo json_encode(array('errorMsg' => 'Some errors occured.'));
}
//$result = @mysql_query($sql);
//if ($result) {
echo json_encode(array(
    'id' => $parameters['per_id'],
    'fname' => $parameters['fname'],
    'lname' => $parameters['lname'],
    'phone' => $parameters['phone'],
    'city' => $parameters['city'],
    'street' => $parameters['street'],
    'province' => $parameters['province']
));
//} else {

?>