<?php
$userName = $_SESSION['user'];
printf(
<<<<<<< HEAD
'<div id="menucolumn">	
		<p><a href="http://www.newestpress.com/" target="_blank">NeWest Home</a></p>
		<p><a href="myaccount.php" style="background:#BD7B57;">My Account</a></p>
		<p><a href="myreviews.php">My Reviews</a></p>
		<p><a href="mymanuscripts.php">My Manuscripts</a></p>
		<p><a href="submit_manuscript.php">New Submission</a></p>
		<p><a href="logout.php">Logout</a></p>
</div>
		'
);
		
?>
=======
    "<div id=\"menucolumn\">
	<p style=\"color: white\">Hi, <span class=\"username\" style=\"color:#fff\">{$userName}</span> </p>
	<p><a href=\"http://www.newestpress.com\" target=\"_blank\">NeWest Home</a></p>
	<p><a href=\"mymanuscripts.php\">My Manuscripts</a></p>
    <p><a href=\"myaccount.php\">My Account</a></p>
    <p><a href=\"submit_manuscript.php\">New Submission</a></p>
	<p><a href=\"logout.php\">Logout</a></p>

</div>");

?>

>>>>>>> 33121a5b575299d1aecf6186b9da3f8ce08f332a
