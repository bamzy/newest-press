<?php
$userName = $_SESSION['user'];
printf(
    '
    
    
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.js"></script>

<script type="text/javascript">
	$(document).ready(function(){
        // reg for author 
        var reg = new RegExp(".*newMyAdministrator.*");
        var r = window.location.href.match(reg);
        if (r != null){
        	$(".tab1").attr("style","background:#d85d10");
        }    
        
	})
</script>
    
    <div id=\"menucolumn\">
		
		<p><a href="http://www.newestpress.com/" target="_blank">NeWest Home</a></p>
		<p><a class="tab1" href=\"newMyAdministrator.php\">Manuscripts</a></p>
		<!--<p><a href=\"accounts.php\">Accounts</a></p>-->
		<p><a href="logout.php">Logout</a></p>

</div>');


?>

