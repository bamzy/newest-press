<html>
<head>
<!DOCTYPE html>
<title>NewWest Press - Manuscript Tracking System</title>
<link rel="stylesheet" href="newest.css" type="text/css">
<style>
input,select{margin-bottom:9px;height:22px}
</style>
<script type="text/javascript">

function validateForm() {

	var $uname;
	var $fname;
	var $lname
	var $street;
	var $city;
	var $province;
	var $postal;
	var $email;
	var $pass1
	var $pass2;
	
	$uname=document.forms["reg"]["uname"].value;
	$fname=document.forms["reg"]["ufname"].value;
	$lname=document.forms["reg"]["ulname"].value;
	$street=document.forms["reg"]["street"].value;
	$city=document.forms["reg"]["city"].value;
	$province=document.forms["reg"]["province"].value;
	$postal=document.forms["reg"]["postal"].value;
	$email=document.forms["reg"]["uemail"].value;
	$pass1=document.forms["reg"]["upass1"].value;
	$pass2=document.forms["reg"]["upass2"].value;

	 if ($uname==null || $uname=="") 
   { 
      alert('Choose a username.'); 
      document.forms["reg"]["uname"].focus(); 
      return false; 
   } 
	
   if ($fname==null || $fname=="") 
   { 
      alert('Please enter your first name.');
      document.forms["reg"]["ufname"].focus(); 
      return false; 
   } 
 
   if ($lname==null || $lname=="") 
   { 
      alert('Please enter your last name.'); 
      document.forms["reg"]["ulname"].focus(); 
      return false; 
   } 
 
   if ($street==null || $street=="") 
   { 
      alert('We require a street address.');
      document.forms["reg"]["street"].focus(); 
      return false; 
   } 
   
    if ($city==null || $city=="") 
   { 
      alert('Please enter a city or town.');
      document.forms["reg"]["city"].focus(); 
      return false; 
   } 
 
   if ($province==null || $province=="") 
   { 
      alert('Please select a province.');
      document.forms["reg"]["province"].focus(); 
      return false; 
   } 
   
    if ($postal==null || $postal=="") 
   { 
      alert('Please enter your postal code.'); 
      document.forms["reg"]["postal"].focus(); 
      return false; 
   } 
   
    if ($email==null || $email=="") 
   { 
      alert("You have not entered an email address. This is important for correspondence with Newest Press and for password retrieval."); 
      document.forms["reg"]["uemail"].focus(); 
      return false; 
   } 
   
   if ($pass1==null || $pass1=="")
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

	<?php include 'header.php'?>
  <div id="main" class="main">

		<div id="sidebar"> <?php include 'sidemenu.php' ?> </div>
		
		<form name="reg" action="reg.php" onsubmit="return validateForm();" method="post" >
			
					<p><span class="pagetitle" style="margin:50px;">Author Registration</span></p>
			<p style="margin-left:222px">
					Username:<br><span class="note">(It must be unique, and cannot be changed)</span><br><input type="text" size=50 maxlength="25" name="uname"><br>
					
					
					 First name:<br><input type="text" size=50 maxlength="50" name="ufname"> <br>
					  
					 Last name:<br><input type="text" size=50 maxlength="75" name="ulname"> <br>
					  
					 Street:<br><input type="text" size=50 maxlength="75" name="street"><br>
					 
					 City:<br><input type="text" size=50 maxlength="75" name="city"><br>
					 
					 Province:<br><select name ="province">
  						<option value="AB">Alberta</option>
  						<option value="BC">British Columbia</option>
  						<option value="MB">Manitoba</option>
  						<option value="NB">New Brunswick</option>
  						<option value="NL">Newfoundland and Labrador</option>
  						<option value="NT">Northwest Territories</option>
  						<option value="NS">Nova Scotia</option>
  						<option value="NU">Nunavut</option>
  						<option value="ON">Ontario</option>
  						<option value="PE">Prince Edward Island</option>
  						<option value="QC">Quebec</option>
  						<option value="SK">Saskatchewan</option>
  						<option value="YT">Yukon</option>
					</select><br> 
					
					 Postal code:<br><input type="text" size=7 maxlength="7" name="postal"><br>
					 
					 Email address:<br><span class="note">(This is necessary in case you forget your password)</span><br><input type="text" size=50 maxlength="75" name="uemail"><br>
					      
					 Password:<br><input type="password" size=50 maxlength="20" name="upass1"><br>  
					 
					 Enter password again:<br><input type="password" size=50 maxlength="20" name="upass2"><br>  
					 <input type="submit" value="Register" style="height:25px;">  
			</p>
			</form>

	</div>
		<div id="footer"><?php include 'footer.php'?></div>
</body>
</html>