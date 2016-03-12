<?php
printf(
'<div id="menucolumn">	
		<p><a href="http://www.newestpress.com/" target="_blank">NeWest Home</a></p>
		<p><a href="author.php">Author Home</a></p>
		<p><a href="submit_manuscript.php">New Submission</a></p>
		<p><a href="myaccount.php">My Account</a></p>
		<p><a href="mymanuscripts.php">My Manuscripts</a></p>
		<p><a href="logout.php">Logout</a></p>');
		printf ('You are logged in as <br /><span class="username">'.$_SESSION['user'].'</span>.
</div> <!---close menucolumn--->'
);
?>