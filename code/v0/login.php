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
 
return true;
}

</script>


</head>

<body> 
   <div id="wrap">
		<div id="header"></div>
		<div id="main">
			
			<p>Welcome to the NeWest Press Manuscript Tracking System. If you wish to submit a manuscript for consideration you must first <a href="./register.php">register</a> with the press. Once you have registered you can submit your manuscript information. You may also submit an electronic copy of your manuscript, although this is not required. You must mail us a printed copy of your manuscript, regardless of whether you submit an electronic manuscript. Hold on to your login, in the event that you wish to submit another manuscript in the future.</p>
		
			
			<p><form name="formLogin" action="login_php.php" onsubmit="return validateForm();" method="post" >

					<p>Username: <input type="text" size=30 name="uname"</p>
					<p>Password: <input type="password" size=30 name="upass"</p>
					
					<input type="submit" value="login">
					<p> Or <a href="./register.php"> sign up here</a>. Accounts are free, and we never share your personal information with anyone, ever.</p>
			</form></p> 
		</div> <!-- end main -->
		<div id="sidebar"><?php include 'sidemenu.php' ?></div>
		<div id="footer">footer stuff</div>
    </div> <!-- end wrap -->
</body>
</html>

		
			
		