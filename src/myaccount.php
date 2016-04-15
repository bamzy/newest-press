<?php
include 'manutrack.php';
sess2();
?>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.js"></script>
<link rel="stylesheet" href="newest.css" type="text/css">

<script type="text/javascript">

function validateForm() {

var fname=document.forms["reg"]["ufname"].value;
var lname=document.forms["reg"]["ulname"].value;
var street=document.forms["reg"]["street"].value;
var city=document.forms["reg"]["city"].value;
var province=document.forms["reg"]["province"].value;
var postal=document.forms["reg"]["postal"].value;
var email=document.forms["reg"]["uemail"].value;

	 
   if (fname==null || fname=="") 
   { 
      alert('Please enter your first name.') 
      document.forms["reg"]["ufname"].focus(); 
      return false; 
   } 
 
   if (lname==null || lname=="") 
   { 
      alert('Please enter your last name.') 
      document.forms["reg"]["ulname"].focus(); 
      return false; 
   } 
   
   if (street==null || street=="") 
   { 
      alert('Please enter a street address.') 
      document.forms["reg"]["street"].focus(); 
      return false; 
   } 
	
	if (city==null || city=="") 
   { 
      alert('Please enter a city or town.') 
      document.forms["reg"]["city"].focus(); 
      return false; 
   } 
	
	if (province==null || province=="") 
   { 
      alert('Please enter a province.') 
      document.forms["reg"]["province"].focus(); 
      return false; 
   } 
	
	if (postal==null || postal=="") 
   {
       alert('Please enter a postall src.')
      document.forms["reg"]["postal"].focus(); 
      return false; 
   } 
   
    if (email==null || email=="") 
   { 
      alert("Your email is necessary for password reminders.") 
      document.forms["reg"]["uemail"].focus(); 
      return false; 
   } 
 
return true;

}

</script>




<?php include'header.php'?>
<div id="main" class='main'>
	<div id="sidebar">
			<?php $file=menuselect($_SESSION['role_id']); 
			include $file;
			?>
		</div>
		
	<p>
		<p><span class="pagetitle">My Account</span></p>

		<?php
		connect();

		$uid=$_SESSION['per_id'];
		$arruser=getuser($uid);

		$fname=$arruser['fname'];
		$lname=$arruser['lname'];
		$street=$arruser['street'];
		$city=$arruser['city'];
		$province=$arruser['province'];
		$postal=$arruser['postal'];
		$email=$arruser['email'];
		$uid=$arruser['per_id'];
        $phone = $arruser['phone'];

        printf('<form name="reg" action="updateuser.php" onsubmit="return validateForm();" method="post" style="font-size: 12px" >');
			printf('<table>');
					printf('<tr><td></td><td><input type=hidden name="uid" value="'.$uid.'"></td></tr>');
					printf('<tr><td>Username:</td><td>'.$arruser['uname'].'</td></tr>');
					printf('<tr><td>First name:</td><td><input type=text name="ufname" value="'.$fname.'" size="50"></td></tr>'); 
					printf('<tr><td>Last name:</td><td><input type=text name="ulname" value="'.$lname.'" size="50"></td></tr>');
					printf('<tr><td>Street:</td><td><input type=text name="street" value="'.$street.'" size="50"></td></tr>');
					printf('<tr><td>City:</td><td><input type=text name="city" value="'.$city.'" size="50"></td></tr>');
					printf('<tr><td>Province:</td><td><input type=text name="province" value="'.$province.'" size="50"></td></tr>');
        printf('<tr><td>Postal src:</td><td><input type=text name="postal" value="' . $postal . '" size="50"></td></tr>');
        printf('<tr><td>Email address:</td><td><input type=text name="uemail" value="' . $email . '" size="50"></td></tr>');
        printf('<tr><td>Phone:</td><td><input type=text name="phone" value="' . $phone . '" size="50"></td></tr>');
					printf('<tr><td></td><td><input type="submit" value="Submit changes"></td></tr>');
			printf('</table>');
		printf('</form>');
		printf('<a href="changepass.php?uid='.$uid.'">Change Password</a>');
		?>
			
	</p>
</div>
<?php include 'footer.php' ?>

