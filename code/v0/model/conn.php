<?php
$conn = new mysqli('localhost', 'root', 'salam', 'newest');
if($conn->connect_errno > 0){
    die('Unable to connect to database [' . $conn->connect_error . ']');
}
//$conn = @mysql_connect('localhost', 'root', 'salam');
//if (!$conn) {
//    die('Could not connect: ' . mysql_error());
//}
//mysql_select_db('newest', $conn);

?>