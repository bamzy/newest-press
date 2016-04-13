<?php
session_start();

printf('<html>
<head>
<!DOCTYPE html>
<title>NewWest Press - Manuscript Tracking System</title>
<link rel="stylesheet" href="newest.css" type="text/css">
</head>

<body> 
   <div id="wrap" class="main">
		<div id="header"></div>
		<div id="main"><p>');

include 'manutrack.php'; 
connect();

$manid=$_POST['manid'];
$revno=$_POST['revno'];
$perid=$_POST['reviewer'];

printf('manid: '.$manid.'');
printf('revno: '.$revno.'');
printf('perid: '.$perid.'');

$first = mysql_query("UPDATE tbl_manuscript SET stat_id=2, datestatus=CURDATE() where man_id=$manid") 

or die(mysql_error());  

$success = mysql_query("INSERT INTO tbl_review (per_id, man_id, date_in, rev_no) 

VALUES($perid,$manid,CURDATE(),$revno)") 

or die(mysql_error());   

	printf('<script type="text/javascript">
	location.replace("viewmanuscript.php?manid='.$manid.'");
	</script>');
 
?>

		</div> <!-- close main -->
		<div id="sidebar"><?php include 'sidemenu.php' ?></div>
		<div id="footer">footer stuff</div>
    </div>
</body>
</html>
