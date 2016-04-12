<?php
printf(
'
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.js"></script>

<script type="text/javascript">
	$(document).ready(function(){
        // reg for author 
        var reg = new RegExp(".*author.*");
        var r = window.location.href.match(reg);
        if (r != null){
        	$(".tab1").attr("style","background:#d85d10");
        }
        
        
        // reg for submit_manuscript 
        var reg = new RegExp(".*submit.*");
        var r = window.location.href.match(reg);
        if (r != null){
        	$(".tab2").attr("style","background:#d85d10");
        }
        
        // reg for myaccount 
        var reg = new RegExp(".*myaccount.*");
        var r = window.location.href.match(reg);
        if (r != null){
        	$(".tab3").attr("style","background:#d85d10");
        }
        
        
        // reg for submit_manuscript 
        var reg = new RegExp(".*mymanuscripts.*");
        var r = window.location.href.match(reg);
        if (r != null){
        	$(".tab4").attr("style","background:#d85d10");
        }
             
        
	})
</script>


<div id="menucolumn">	
		<p><a href="http://www.newestpress.com/" target="_blank">NeWest Home</a></p>
		<p><a class="tab1" href="author.php">Author Home</a></p>
		<p><a class="tab2" href="submit_manuscript.php">New Submission</a></p>
		<p><a class="tab3" href="myaccount.php">My Account</a></p>
		<p><a class="tab4" href="mymanuscripts.php">My Manuscripts</a></p>
		<p><a href="logout.php">Logout</a></p>');
		printf ('
</div> <!---close menucolumn--->'
);
?>