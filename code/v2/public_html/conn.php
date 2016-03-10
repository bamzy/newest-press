<?php

$conn = @mysql_connect('localhost', 'root', 'salam');
if (!$conn) {
    die('Could not connect: ' . mysql_error());
}
mysql_select_db('newest', $conn);

?>