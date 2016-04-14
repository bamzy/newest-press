<html>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>



<div class="header">
	<div class="top">
		<div class="top-inner">
						<?php
							if(isset($_SESSION['user'])) {
								//session_start();
		  						$userName = $_SESSION['user'];
		  						
		  						$query = "SELECT per_id, role_id FROM tbl_people WHERE uname LIKE  '{$username}'";
								if (!$res = mysqlConnection::getConnection()->query($query)) {
									die('There was an error running the query [' . $query->error . ']');
								}
								while ($arr = $res->fetch_assoc()) {
									$uid = $arr['per_id'];
									$roleid = $arr['role_id'];
								}
								$_SESSION['role_id'] = $roleid;
								echo "{$roleid}";
								echo "Hi, {$userName}!" .'&nbsp;&nbsp;&nbsp;'.'<a href="logout.php">Logout</a>';
							}
			
						 ?>
		</div>
	</div>
	
	<div class="nav">
		<div class="nav-inner">
			
			<ul>
				<li><a href="index.php">Manuscript Tracking System</a></li>
			</ul>

		</div>
	</div>
	<div class="clear"></div>
	<div class="logo">

		<a href="login.php">
	
	<img src="images/newestpress-logo.png"> </a></div>

</div>

<div class="main-clear"></div>

</body>
</html>
<!--<a href="http://newestpress.com/">-->