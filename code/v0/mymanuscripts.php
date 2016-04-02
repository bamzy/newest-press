<?php

include 'manutrack.php';
sess();
include'header.php';

?>

<div class="main" id="main">
	<div id="sidebar">
			<?php $file=menuselect($_SESSION['role_id']); 
			include $file;
			?>
	</div>
	<?php
	printf('<p><span class="pagetitle">My Manuscripts</span></p>');
	printf('<p>Please review our <a href="https://newestpress.com/submissions" target="_blank">submission guidelines</a> before submitting a manuscript, then click "New Submission" in the side menu.</p>');
	connect();
	$per_id=$_SESSION['per_id'];
	getmanper($per_id);

	//Print_r ($_SESSION);
	//printf('perid: '.$per_id.'');

	?>

</div>

<?php include'footer.php'?>