<?php
printf(
'


<script type="text/javascript">
	$(document).ready(function(){
        // reg for author 
        var reg = new RegExp(".*Author.*");
        var r = window.location.href.match(reg);
        if (r != null){
        	$(".tab1").attr("style","background:#d85d10");
        }
        

    
        
        // reg for mymanuscripts 
        var reg = new RegExp(".*mymanuscripts.*");
        var r = window.location.href.match(reg);
        if (r != null){
        	$(".tab3").attr("style","background:#d85d10");
        }
        
             
                // reg for author 
        var reg = new RegExp(".*account.*");
        var r = window.location.href.match(reg);
        if (r != null){
        	$(".tab2").attr("style","background:#d85d10");
        }
	});
</script>


<div id="menucolumn">	
		<p><a href="http://www.newestpress.com/" target="_blank">NeWest Home</a></p>
		<p><a class="tab1" href="newMyAuthor.php">Author Home</a></p>
		<p><a class="tab2" href="myaccount.php">My Account</a></p>
		<p><a class="tab3" href="mymanuscripts.php">My Manuscripts</a></p>
		<p><a href="logout.php">Logout</a></p>');
		printf ('
</div> <!---close menucolumn--->'
);
?>