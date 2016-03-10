<?php

include 'manutrack.php';
sess();
connect();

		if ($_SESSION['role_id'] == 3){
		
			include 'ed_search_menu.php';
		}
		
		
		else {
		printf('Only editors and reviewers may view this page.');
		}

	   if ($_GET['search']=="getmanall"){ 
			getmanall();
		}

		elseif ($_GET['search']=="getmanbyauth"){ 
			getmanbyauth();
		}
		
		elseif ($_GET['search']=="getmanbydateall"){ 
			getmanbydateall();
		}
		
		elseif ($_GET['search']=="getmanactiveall"){ 
			getmanactiveall();
		}
		
		elseif ($_GET['search']=="manukw"){ 
			$field=$_GET['field'];
			$text=$_GET['keywords'];
			getmankw($field, $text);
		}
		
		elseif ($_GET['search']=="getmanbystatus"){ 
			$statid=$_GET['status'];
			getmanbystatus($statid);
		}
		
		elseif ($_GET['search']=="getmanbydate"){ 
			$from=$_GET['from'];
			$arr=explode('/',$from);
			$dd=$arr[0];
			$mm=$arr[1];
			$yy="20".$arr[2];
			$from2=$yy."-".$mm."-".$dd." 00:00:00";
			print ('From: '.$from2.'  ');
			
			$to=$_GET['to'];
			$arr=explode('/',$to);
			$dd=$arr[0];
			$mm=$arr[1];
			$yy="20".$arr[2];
			$to2=$yy."-".$mm."-".$dd." 23:59:59";
			print ('To: '.$to2.' ');
			getmanbydate($from2, $to2);
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
