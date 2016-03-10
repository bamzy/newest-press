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

if(isset($_GET['manid'])){

$manid=$_GET['manid'];

}

else{

$manid=$_SESSION['man_id'];

}

//printf('session manid: '.$_GET['manid'].'');
//printf('manid: '.$manid.'');
//printf('session manid: '.$_SESSION['man_id'].'');

printf ('<h2>Upload Manuscript (optional):</h2>');
printf('<p><a href="mymanuscripts.php">Skip this step</a></p> ');
getman($manid);

printf('</p><form name="doc" enctype="multipart/form-data" action="uploader.php" onsubmit="return validateForm();" method="POST">');
printf('<input type="hidden" name="manid" value='.$manid.'>');
?>
<input type="radio" name="partial" value="F" checked>Full manuscript&nbsp;
<input type="radio" name="partial" value="P">Partial manuscript<br /><br />
<input type="hidden" name="MAX_FILE_SIZE" value="16777216" />
Choose a file to upload: <input name="file" type="file" /><br /><br />
<input type="submit" value="Upload File" />
</form> 
		</div>
		<div id="sidebar">
		<?php $file=menuselect($_SESSION['role_id']); 
		include $file;
		?></div>
		<div id="footer">footer stuff</div>
    </div>
</body>
</html>