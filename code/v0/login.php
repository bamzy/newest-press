<html>
<head>
<!DOCTYPE html>
<title>NeWest Press Manuscript Tracking</title>
<link rel="stylesheet" href="newest.css" type="text/css">
<link rel="icon" href="./images/favicon.ico">

<script type="text/javascript">

function validateForm() {

$uname=document.forms["formLogin"]["uname"].value;
$upass=document.forms["formLogin"]["upass"].value;

	 if ($uname==null || $uname=="") 
   { 
      alert("Please enter a username.") 
      document.forms["formLogin"]["uname"].focus(); 
      return false; 
   } 
 
   if ($upass==null || $upass=="") 
   { 
      alert("Please enter a password.") 
      document.forms["formLogin"]["upass"].focus(); 
      return false;
   }
	console.log($uname);
 
return true;
}

</script>

<?php include'header.php' ?>

		<div class="main" id="main">
			<div id="sidebar" style="width: 15%!important"><?php include 'sidemenu.php' ?></div>
			<p>Welcome to the NeWest Press Manuscript Tracking System. If you wish to submit a manuscript for consideration you must first <a href="./register.php">register</a> with the press. Once you have registered you can submit your manuscript information. You may also submit an electronic copy of your manuscript, although this is not required. You must mail us a printed copy of your manuscript, regardless of whether you submit an electronic manuscript. Hold on to your login, in the event that you wish to submit another manuscript in the future.</p>


			<!--			<p><form name="formLogin" action="login_php.php" onsubmit="return validateForm();" method="POST" >-->
			<form name="formLogin" action="login_php.php" method="post">
				<TABLE BORDER="0">
					<tr>
						<th>Username</th>
						<TD>
							<input type="text" size=30 id="uname" name="uname">
						</TD>
					</tr>
					<tr>
						<th>Password</th>
						<TD><input type="password" size=30 id="upass" name="upass"></TD>
					</tr>
					<tr>
						<!--					<td>-->
						<!--					</td>-->
					</tr>
				</TABLE>
				<input type="submit" style="width: 150px;height: 25px" value="login">

			</form>

			<div style="padding-left: 200px;"><p>Login here Or <a href="./register.php"> sign up here</a>. Accounts are
					free, and we never share your personal information with anyone, ever.</p></div>
		</div> <!-- end main -->

	<div class="clear"></div>
<?php include'footer.php' ?>

		
			
		