<?php

include 'manutrack.php';
include 'header.php';
sess();
connect();
?>
<div class='main' id='main'>
<div id="sidebar">
		<?php $file=menuselect($_SESSION['role_id']); 
		include $file;
		?></div>
<?php
		if ($_SESSION['role_id'] == 3){
		
			include 'people_search_menu.php';
		}
		
		if ($_GET['search']=="getauthname"){ 
			peoplebyname();
		}
		
		elseif ($_GET['search']=="getauthuname"){ 
			peoplebyuname();
		}
		
		elseif ($_GET['search']=="getauthdate"){ 
			peoplebydate();
		}
		
		elseif ($_GET['search']=="authkw"){ 
			$trunc=$_GET['trunc'];
			$keywordst=$_GET['keywords'];
			getauthkw($trunc, $keywords);
		}
		
		elseif ($_GET['search']=="getauthbyrole"){ 
			$roleid=$_GET['role'];
			getauthbyrole($roleid);
		}
		
		
		
?>
		
		
		</p></div>
		
		
    </div>
</body>
</html>
