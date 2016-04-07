<?php
session_start();
$rest_json = file_get_contents("php://input");
$_POST = json_decode($rest_json, true);
$_POST = parse_str($rest_json, $parameters);


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

$uid = $parameters['uid'];
$ufname = "'" . mysqlConnection::getConnection()->real_escape_string($parameters['ufname']) . "'";
$ulname = "'" . mysqlConnection::getConnection()->real_escape_string($parameters['ulname']) . "'";
$street = "'" . mysqlConnection::getConnection()->real_escape_string($parameters['street']) . "'";
$city = "'" . mysqlConnection::getConnection()->real_escape_string($parameters['city']) . "'";
$province = "'" . mysqlConnection::getConnection()->real_escape_string($parameters['province']) . "'";
$postal = "'" . mysqlConnection::getConnection()->real_escape_string($parameters['postal']) . "'";
$uemail = "'" . mysqlConnection::getConnection()->real_escape_string($parameters['uemail']) . "'";

//$success = mysql_query("UPDATE tbl_people SET fname=$ufname, lname=$ulname, street=$street, city=$city, province=$province, postal=$postal, email=$uemail WHERE per_id=$uid")
$query = "UPDATE tbl_people SET fname={$ufname}, lname={$ulname}, street={$street}, city={$city}, province={$province}, postal={$postal}, email={$uemail} WHERE per_id={$uid}";
if ($res = mysqlConnection::getConnection()->query($query)) {


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
