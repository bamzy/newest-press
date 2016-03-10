<?php
include 'manutrack.php';
sess2();
connect();

$safe="bunchwordspiswallopnomeeeenerthang9357211";
$upass2=md5($_POST['upass1'].$safe);
$upass="'".$upass2."'";
$uid=$_POST['uid'];

$success = mysql_query("UPDATE tbl_people SET pass=$upass WHERE per_id=$uid") or die(mysql_error()); 

print('<script type="text/javascript">
alert("Your password has been changed successfully.");
location.replace("myaccount.php");
</script>');

?>

