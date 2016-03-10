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

$safe="bunchwordspiswallopnomeeeenerthang9357211";
$upass2=md5($_POST['upass1'].$safe);

$username=$_POST['uname'];
$userpass=$_POST['upass'];
$uname="'".mysql_real_escape_string( $_POST['uname'] )."'";
$ufname="'".mysql_real_escape_string( $_POST['ufname'] )."'";
$ulname="'".mysql_real_escape_string( $_POST['ulname'] )."'";
$uemail="'".mysql_real_escape_string( $_POST['uemail'] )."'";
$upass="'".$upass2."'";
//printf ('hashed: '.$upass.'');
$street="'".mysql_real_escape_string( $_POST['street'] )."'";
$city="'".mysql_real_escape_string( $_POST['city'] )."'";
$province="'".mysql_real_escape_string( $_POST['province'] )."'";
$postal="'".mysql_real_escape_string( $_POST['postal'] )."'";

$success = mysql_query("INSERT INTO tbl_people (uname, pass, fname, lname, street, city, province, postal, email) 

VALUES($uname,$upass,$ufname,$ulname,$street,$city,$province,$postal,$uemail)") 

or die(mysql_error());  

If (!$success){

        printf("<p>That didn't work.</p>");
        printf('<a href="login.php">Try again.</a>');
   } 
     
else {
        //printf('You in');
		//printf(' post good ');
		//user registered successfully, authenticate her
	
        // auth okay, setup session
        $_SESSION['user'] = $username;

        $cloud = mysql_query("SELECT per_id, role_id FROM tbl_people WHERE uname LIKE '$username'");

     	while ($arr = mysql_fetch_assoc($cloud)){
     	$uid=$arr['per_id'];
     	$roleid=$arr['role_id'];
	  	}
	 
	    $_SESSION['per_id'] = $uid;
	    $_SESSION['role_id']=$roleid;
	    //printf ('Session variable set'.$_SESSION['user'].' giver.');
	    
	    if ($roleid==1){
	    
	    printf('<script type="text/javascript">
		location.replace("editor.php");
		</script>');
	    }
	    
	    if ($roleid==2){
	    header("Location: reviewer.php");
	    printf('<script type="text/javascript">
	    location.replace("reviewer.php");
	    </script>');
	    }
	    
	    else{
	    header("Location: mymanuscripts.php");
	    printf('<script type="text/javascript">
	    location.replace("mymanuscripts.php");
	    </script>');
	    }
     
}

//printf("<p>Hi there, ".$_SESSION['user'].". You're one of us now. Thanks for registering.</p>");

?>

		</div> <!-- close main -->
		<div id="sidebar"><?php include 'sidemenu.php' ?></div>
		<div id="footer">footer stuff</div>
    </div>
</body>
</html>
