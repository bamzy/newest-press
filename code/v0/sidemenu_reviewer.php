<?php
$userName = $_SESSION['user'];

printf(
'

<div id="menucolumn">	
		<p><a href="http://www.newestpress.com/" target="_blank">NeWest Home</a></p>
		<p><a class="tab" href="myaccount.php">My Account</a></p>
		<p><a class="tab" href="newMyReview.php">My Reviews</a></p>
		<!--<p><a href="mymanuscripts.php" >My Manuscripts</a></p>-->
		<!--<p><a href="submit_manuscript.php">New Submission</a></p>-->
		<p><a href="logout.php">Logout</a></p>
</div>
	

');


// $(".tab").attr("style","background:green");

		
?>


