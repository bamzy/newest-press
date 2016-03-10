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

$pass1=document.forms["reg"]["upass1"].value;
$pass2=document.forms["reg"]["upass2"].value;

if ($pass1==null || $pass1=="" || $pass1==" ")

   { 
   	  alert('You must choose a password.'); 
      document.forms["reg"]["upass1"].focus(); 
      return false; 
   } 
   
   if ($pass1!==$pass2) 
   { 
      alert('The passwords do not match. Please try again.'); 
      document.forms["reg"]["upass1"].focus(); 
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
$uid=$_GET['uid'];

		printf('<form name="reg" action="changep.php" onsubmit="return validateForm();" method="post">');
		printf('<table>');
		printf('<tr><td align="right"></td><td><input type="hidden" name="uid" value="'.$uid.'"></td></tr>');
?>
		<tr><td align="right">Enter new password:</td><td><input type="password" size=50 maxlength="20" name="upass1"></td></tr>
		<tr><td align="right">Enter password again:</td><td><input type="password" size=50 maxlength="20" name="upass2"></td></tr>
		<tr><td align="right"></td><td><input type="submit" value="Change Password"></td></tr>
		</table>
		</form>
		</p></div>
		<div id="sidebar"><?php $file=menuselect($_SESSION['role_id']); 
		include $file;
		?>
		</div>
		<div id="footer">footer stuff</div>
    </div>
</body>
</html>
