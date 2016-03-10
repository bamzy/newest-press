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
$statid=$_POST['statid'];
$active="'".$_POST['active']."'";
$title2="'".$_POST['title']."'";
$title="'".mysql_real_escape_string( $_POST['title'] )."'";
$genre="'".mysql_real_escape_string( $_POST['genre'] )."'";
$notes="'".mysql_real_escape_string( $_POST['notes'] )."'";

printf('uid: '.$uid.'<br />');
printf('statid: '.$statid.'<br />');
printf('active: '.$active.'<br />');
printf('title: '.$title.'<br />');
printf('genre: '.$genre.'<br />');
printf('notes: '.$notes.'');

$success = mysql_query("INSERT INTO tbl_manuscript (per_id, stat_id, active, datestatus, title_orig, genre, notes) 

VALUES($uid,$statid,$active,CURDATE(),$title,$genre,$notes)") 

or die(mysql_error()); 

If ($success == true){

//printf('yup');
printf(''.$title.'');
printf(''.$title2.'');

$cloud = mysql_query("SELECT man_id from tbl_manuscript WHERE title_orig = $title") or die(mysql_error()); 

	while ($arr = mysql_fetch_assoc($cloud)){
	
					$_SESSION['man_id']=$arr['man_id']; 
					$manid=$arr['man_id'];
					
					//printf('sess manid: '.$_SESSION['man_id'].'');
					//printf('arr manid: '.$arr['man_id'].'');
	
		printf('<script type="text/javascript">
		alert("Your manuscript tracking number is '.$manid.'.");
		location.replace("submit_doc.php?manid='.$manid.'");
		</script>');
		
	   } 
}
     
else {
     
	printf('<script type="text/javascript">
	alert("There was problem with this submission. Please try again.");
	location.replace("submit_manuscript.php");
	</script>');
        
}


?>

		</div> <!-- close main -->
		<div id="sidebar"><?php include 'sidemenu.php' ?></div>
		<div id="footer">footer stuff</div>
    </div>
</body>
</html>
