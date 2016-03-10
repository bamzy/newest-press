<?php

include 'manutrack.php';
sess();
connect();

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
		<div id="sidebar">
		<?php $file=menuselect($_SESSION['role_id']); 
		include $file;
		?></div>
		<div id="footer">footer stuff</div>
    </div>
</body>
</html>
