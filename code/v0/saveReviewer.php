<?php

$fullNmae = htmlspecialchars($_REQUEST['name']);
$phone = htmlspecialchars($_REQUEST['phone']);
$email = htmlspecialchars($_REQUEST['email']);
$address = htmlspecialchars($_REQUEST['address']);
$rest_json = file_get_contents("php://input");
$_POST = json_decode($rest_json, true);
$_POST = parse_str($rest_json);

include 'mysqlConnection.php';

$sql = "insert into tbl_people(name,phone,email,address) values('$fullNmae','$phone','$email','$address')";
$result = @mysql_query($sql);
if ($result) {
    echo json_encode(array(
        'id' => mysql_insert_id(),
        'name' => $fullNmae,
        'phone' => $phone,
        'email' => $email,
        'address' => $address
    ));
} else {
    echo json_encode(array('errorMsg' => 'Some errors occured.'));
}
?>