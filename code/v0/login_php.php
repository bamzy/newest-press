<?php
//header("Content-Type: application/json");
session_start();
printf('<html>
<head>
<!DOCTYPE html>
<title>NeWest Press - Manuscript Tracking System</title>
<link rel="stylesheet" href="newest.css" type="text/css">
</head>

<body> 
   <div id="wrap">
		<div id="header"></div>
		<div id="main"><p>');
		
include 'manutrack.php';
//include './model/conn.php';

$rest_json = file_get_contents("php://input");
$_POST = json_decode($rest_json, true);
$_POST = parse_str($rest_json);
$username = $uname;
$userpass = $upass;
//$username=$_POST['uname'];
//$userpass=$_POST['upass'];
//connect();

//printf ('success: '.$success.'');

if (auth($username, $userpass)) {
		
		// auth okay, setup session
		
        $_SESSION['user'] = $username;

        $cloud = mysql_query("SELECT per_id, role_id FROM tbl_people WHERE uname LIKE '$username'");

     	while ($arr = mysql_fetch_assoc($cloud)){
     	$uid=$arr['per_id'];
     	$roleid=$arr['role_id'];
	  	}
	 
	    $_SESSION['per_id'] = $uid;
	$_SESSION['role_id'] = $roleid;
        
			if ($roleid==3){
			printf('<script type="text/javascript">
			location.replace("newManuscripts.php");
			</script>');
			}
			
			if ($roleid==2){
			printf('<script type="text/javascript">
			location.replace("myreviews.php");
			</script>');
			}
			
			else{
			printf('<script type="text/javascript">
			location.replace("newManuscripts.php");
			</script>');
			}
} 
     
else {
        // didn't auth
	include "header.php";

	printf("<div style='height: 300px;text-align: center'><p>Authentication failed <a href=\"./login.php\">Try again.</a>.</p></div>");

	include "footer.php";

}


?>

</p></div> <!--end main-->

<!--		<div id="sidebar">--><?php //include 'sidemenu.php' ?><!--</div>-->
<!--		<div id="footer">footer stuff</div>-->
    </div> <!--end wrap-->
</body>
</html>