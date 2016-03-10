<?php
include 'manutrack.php';
sess2();
?>

<html>
<head>
<!DOCTYPE html>
<title>NeWest Press - Manuscript Tracking System</title>
<link rel="stylesheet" href="newest.css" type="text/css">

<script type="text/javascript">

function validateForm() {

var title=document.forms["manuinfo"]["title"].value;
	 
   if (title==null || title=="") 
   { 
      alert('You must enter a working title for your manuscript.') 
      document.forms["manuinfo"]["title"].focus(); 
      return false; 
   } 
 	
return true;

}

</script>

</head>

<body> 
   <div id="wrap">
		<div id="header"></div>
		<div id="main"><p>
<?php
connect();

$uid=$_SESSION['per_id'];
$urole=$_SESSION['role_id'];

printf ('<p>You are logged in as <span class="username">'.$_SESSION['user'].'</span>.</p>');

?>

<h2>Enter Manuscript Information:</h2>
<form name="manuinfo" action="addmanu.php" onsubmit="return validateForm();" method="post" >
<table>
<?php 

	if ($_SESSION['role_id']==3){
	printf('<tr><td>Select User:</td><td>Not written yet</td></tr>'); 
	}
	
	else{
	printf('<tr><td></td><td><input type=hidden name="uid" value="'.$uid.'"></td></tr>'); 
	}
	
?>
<tr><td></td><td><input type="hidden" name="statid" value=1></td></tr>
<tr><td></td><td><input type="hidden" name="active" value='Y'></td></tr>
<tr><td>Title:</td><td><input type="text" name="title" size=75 ></td></tr>
<tr><td>Genre:</td><td><input type="text" name="genre" size=50 ></td></tr>
<tr><td>Notes:</td><td><textarea name="notes" cols=50 rows=4></textarea></td></tr>
<tr><td></td><td><input type="submit" value="submit"></td></tr>
</table>
</form>
		</p></div>
		<div id="sidebar">
		<?php $file=menuselect($_SESSION['role_id']); 
		include $file;
		?></div>
		<div id="footer">footer stuff</div>
    </div>
</body>
</html>