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

</script>

</head>

<body> 
   <div id="wrap">
		<div id="header"></div>
		<div id="main"><p>
		<p><span class="pagetitle">User Account</span></p>

<?php
connect();
//printf('<br />roleid: '.$_SESSION['role_id'].'');

if ($_SESSION['role_id'] == 1){
		
		printf('Only editors may view this page.');
		printf('<script type="text/javascript">
			location.replace("author.php");
			</script>');
		}

$uid=$_GET['perid'];
$arruser=getuser($uid);

$fname=$arruser['fname'];
$lname=$arruser['lname'];
$street=$arruser['street'];
$city=$arruser['city'];
$province=$arruser['province'];
$postal=$arruser['postal'];
$email=$arruser['email'];
$uid=$arruser['per_id'];
$active=$arruser['active'];
			
			printf('<span class="edituser">');
			printf('<form name="reg" action="updateuser.php" onsubmit="return validateForm();" method="post" >');
			printf('<table>');
					printf('<tr><td></td><td><input type=hidden name="uid" value="'.$uid.'"></td></tr>');
					printf('<tr><td>Username:</td><td>'.$arruser['uname'].'</td></tr>');
					printf('<tr><td>First name:</td><td><input type=text name="ufname" value="'.$fname.'" size="50"></td></tr>'); 
					printf('<tr><td>Last name:</td><td><input type=text name="ulname" value="'.$lname.'" size="50"></td></tr>');
					printf('<tr><td>Street:</td><td><input type=text name="street" value="'.$street.'" size="50"></td></tr>');
					printf('<tr><td>City:</td><td><input type=text name="city" value="'.$city.'" size="50"></td></tr>');
					printf('<tr><td>Province:</td><td><input type=text name="province" value="'.$province.'" size="50"></td></tr>');
printf('<tr><td>Postal src:</td><td><input type=text name="postal" value="' . $postal . '" size="50"></td></tr>');
					printf('<tr><td>Email address:</td><td><input type=text name="uemail" value="'.$email.'" size="50"></td></tr>');
					printf('<tr><td></td><td><input type="submit" value="Edit Account"></td></tr>');
			printf('</table>');
			printf('</form>');
			printf('<a href="changepass.php?uid='.$uid.'">Set User Password</a></span>');
			
//printf('<br />roleid: '.$_SESSION['role_id'].'');

if ($_SESSION['role_id']==3){
		
			printf('<span class="edblock">');

			if ($arruser['active'] == 'Y'){
			
			 printf('Active&nbsp;<span class="note"><a href="deactivateaccount.php?uid='.$uid.'&active=N">(Make Inactive)</a></span><br /><br />');
			
			}
			
			else{
			
			  printf('Inactive&nbsp;<span class="note"><a href="deactivateaccount.php?uid='.$uid.'&active=Y">(Make Active)</a></span><br /><br />');
			 
			}
	
			printf('<form name="changerole" action="changerole.php" method="post"><input type="hidden" value="'.$uid.'" name="perid"><select name="roleid" size="3">');


			$cloud2 = mysql_query("SELECT role_id, role_desc FROM tbl_role");

    		while ($arr2 = mysql_fetch_assoc($cloud2)){

    		$roleid2=$arr2['role_id'];
			$roledesc=$arr2['role_desc'];
	
				if ($roleid2==$arruser['role_id']){
				printf('<option selected value="'.$roleid2.'">'.$roledesc.'</option>');
				}
				
				else {
			
				printf('<option value="'.$roleid2.'">'.$roledesc.'</option>');
			
				 }
          
     		}     
				 
			  printf('</select></td></tr>

			<tr><td></td><td><input type="submit" value="Set Role"></td></tr>

			</table></form></span>');
	}	

?>	
		</div>
		<div id="sidebar"><?php $file=menuselect($_SESSION['role_id']); 
		include $file;
		?></div>
		<div id="footer">footer stuff</div>
    </div>
</body>
</html>