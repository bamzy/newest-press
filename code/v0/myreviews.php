<?php

include 'manutrack.php';
sess();

printf('<p><span class="pagetitle">My Reviews</span></p>

<div id="inlinemenu">
<a href="myreviews.php?search=newreviews">New Reviews</a>
<a href="myreviews.php?search=recentreviews">Recent Reviews</a>
<a href="myreviews.php?search=allreviews">All Reviews</a>
</div><br />');

connect();

$per_id=$_SESSION['per_id'];

if ($_GET['search']=='recentreviews'){

	getmanrevrecent($per_id);

}

elseif($_GET['search']=='allreviews'){
 	
 	getmanrevall($per_id);
 	
 }

else{

	getmanrevnew($per_id);

}

//Print_r ($_SESSION);


?>
		
		
		
		</p></div>
		<div id="sidebar">
		<?php $file=menuselect($_SESSION['role_id']); 
		include $file;
		?></div>
		<div id="footer">footer stuff</div>
    </div>
</body>
</html>
