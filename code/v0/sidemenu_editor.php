<?php
printf(
'<div id="menucolumn">	
		<p><a href="http://www.newestpress.com/catalog/" target="_blank">NeWest Home</a></p>
		<p><a href="manuscripts.php">Manuscripts</a></p>
		<p><a href="accounts.php">Accounts</a></p>
		<p><a href="logout.php">Logout</a></p>');
		printf ('You are logged in as <br /><span class="username">'.$_SESSION['user'].'</span>.
</div> <!---close menucolumn--->'
);
?>