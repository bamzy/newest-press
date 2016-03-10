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

$uid=$_POST['uid'];
$ufname="'".mysql_real_escape_string( $_POST['ufname'] )."'";
$ulname="'".mysql_real_escape_string( $_POST['ulname'] )."'";
$street="'".mysql_real_escape_string( $_POST['street'] )."'";
$city="'".mysql_real_escape_string( $_POST['city'] )."'";
$province="'".mysql_real_escape_string( $_POST['province'] )."'";
$postal="'".mysql_real_escape_string( $_POST['postal'] )."'";
$uemail="'".mysql_real_escape_string( $_POST['uemail'] )."'";

$success = mysql_query("UPDATE tbl_people SET fname=$ufname, lname=$ulname, street=$street, city=$city, province=$province, postal=$postal, email=$uemail WHERE per_id=$uid") 

or die(mysql_error());  

If ($success == true){


	printf('<script type="text/javascript">
	alert("Your account information has been changed successfully.");
	location.replace("myaccount.php");
	</script>');
    
   } 
     
else {
     
	printf('<script type="text/javascript">
	alert("There was problem with this update. Please try again.");
	location.replace("myaccount.php");
	</script>');
        
}


//printf("<p>Hi there, ".$_SESSION['user'].". You're one of us now. Thanks for registering.</p>");

?>

		</div> <!-- close main -->
		<div id="sidebar"><?php include 'sidemenu.php' ?></div>
		<div id="footer">footer stuff</div>
    </div>
</body>
</html>
