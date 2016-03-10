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

$revid=$_POST['revid'];
$edreqid=$_POST['edreqid'];
$recid=$_POST['recid'];
$comments="'".mysql_real_escape_string( $_POST['comments'] )."'";

printf('revid:'.$revid.'');
printf('edreqid'.$edreqid.'');
printf('recid'.$recid.'');
printf('comments'.$comments.'');

$success = mysql_query("UPDATE tbl_review SET rec_id=$recid, edreq_id=$edreqid, comments=$comments, date_rec=CURDATE() where rev_id=$revid") 

or die(mysql_error());  

If ($success == true){


	printf('<script type="text/javascript">
	alert("Your review has been submitted. Thank you.");
	location.replace("myreviews.php");
	</script>');
    
   } 
     
else {
     
	printf('<script type="text/javascript">
	alert("There was problem with this update. Please try again.");
	location.replace("myreviews.php");
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
