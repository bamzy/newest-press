<html>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>



<div class="header">
	<div class="top">
		<div class="top-inner">
			<!--<a href="#">Sign in</a>&nbsp;&nbsp;|&nbsp;
			<a href="#">Contact</a>
			-->
						<?php
							if(isset($_SESSION['user'])) {
//								session_start();
		  						$userName = $_SESSION['user'];
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
	<div class="logo"><a href="http://newestpress.com/"><img src="images/newestpress-logo.png"> </a></div>

</div>

<div class="main-clear"></div>

</body>
</html>