<?php
include 'manutrack.php';

sess2();
connect();

$safe="bunchwordspiswallopnomeeeenerthang9357211";
$upass2=md5($_POST['upass1'].$safe);
$upass="'".$upass2."'";
$uid=$_POST['uid'];

$query = "UPDATE tbl_people SET pass=$upass WHERE per_id=$uid";
if (!$res = mysqlConnection::getConnection()->query($query)) {
    die('There was an error running the query [' . $query->error . ']');
}//$success = mysql_query($query) or die(mysql_error());

print('<script type="text/javascript">
alert("Your password has been changed successfully.");
location.replace("myaccount.php");
</script>');

?>

