<?php

include 'manutrack.php';
sess();

printf('<p><span class="pagetitle">My Manuscripts</span></p>');
printf('<p>Please review our <a href="http://www.newestpress.com/catalog/content/view/18/32/" target="_blank">submission guidelines</a> before submitting a manuscript, then click "New Submission" in the side menu.</p>');
connect();
$per_id=$_SESSION['per_id'];
getmanper($per_id);

//Print_r ($_SESSION);
//printf('perid: '.$per_id.'');

?>
		
		
		
		</p></div>
		<div id="sidebar">
		<?php $file=menuselect($_SESSION['role_id']); 
		include $file;
		?></div>
		<div id="footer">footer stuff</div>


///////////////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////////////




    </div>
</body>
</html>
