<?php
$userName = $_SESSION['user'];
printf(
    "<div id=\"menucolumn\">
		<p style=\"color: white\">You are logged in as <span class=\"username\" style=\"color:#1d5987\">{$userName}</span> </p>
		<p><a href=\"http://www.newestpress.com/\" target=\"_blank\">NeWest Home</a></p>
		<p><a href=\"manuscripts.php\">Manuscripts</a></p>
		<p><a href=\"accounts.php\">Accounts</a></p>
		<p><a href=\"logout.php\">Logout</a></p>

</div>");


?>

