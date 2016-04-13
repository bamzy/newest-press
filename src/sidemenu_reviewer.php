<?php
$userName = $_SESSION['user'];

printf(
'


<script type="text/javascript">
	$(document).ready(function(){
        // reg for myaccount 
        var reg = new RegExp(".*myaccount.*");
        var r = window.location.href.match(reg);
        if (r != null){
        	$(".tab1").attr("style","background:#d85d10");
        }
        
        
        // reg for newmyreview 
        var reg = new RegExp(".*newMyReview.*");
        var r = window.location.href.match(reg);
        if (r != null){
        	$(".tab2").attr("style","background:#d85d10");
        }
        
        
        
        
	})
</script>

<div id="menucolumn">	
		<p><a href="http://www.newestpress.com/" target="_blank">NeWest Home</a></p>
		<p><a class="tab1" href="myaccount.php">My Account</a></p>
		<p><a class="tab2" href="newMyReview.php">My Reviews</a></p>
		
		<!--<p><a href="mymanuscripts.php" >My Manuscripts</a></p>-->
		<!--<p><a href="submit_manuscript.php">New Submission</a></p>-->
		
		<p><a href="logout.php">Logout</a></p>
</div>
	

');


// $(".tab").attr("style","background:green");

		
?>


