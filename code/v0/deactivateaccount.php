<?php
session_start();

printf('<html>
<head>
<!DOCTYPE html>
<title>NewWest Press - Manuscript Tracking System</title>
<link rel="stylesheet" href="newest.css" type="text/css">
</head>

<body> 
   <div id="wrap">
		<div id="header"></div>
		<div id="main"><p>');

include 'manutrack.php'; 
connect();

$uid=$_GET['uid'];
$active="'".$_GET['active']."'";


$success = mysql_query("UPDATE tbl_people SET active=$active WHERE per_id=$uid") 

or die(mysql_error());  

	printf('<script type="text/javascript">
	location.replace("viewauthor.php?perid='.$uid.'");
	</script>');
 
?>

		</div> <!-- close main -->
		<div id="sidebar"><?php include 'sidemenu.php' ?></div>
		<div id="footer">footer stuff</div>
    </div>
</body>
</html>
