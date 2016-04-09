<link rel="stylesheet" type="text/css" href="./resources/jeasyui/themes/default/easyui.css">
<link rel="stylesheet" type="text/css" href="./resources/jeasyui/themes/icon.css">
<link rel="stylesheet" type="text/css" href="./resources/jeasyui/themes/color.css">
<link rel="stylesheet" type="text/css" href="./resources/jeasyui/demo/demo.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="newest.css">
<link rel="stylesheet" type="text/css" href="style.css">
<script type="text/javascript" src="./resources/jeasyui/jquery.min.js"></script>
<script type="text/javascript" src="./resources/jeasyui/jquery.easyui.min.js"></script>
<script type="text/javascript" src="js/manuscript.js"></script>
<script type="text/javascript" src="js/reviewer.js"></script>
<script type="text/javascript" src="js/review.js"></script>

<?php
include "header.php";
include 'manutrack.php';
sess();
connect();
?>


<div class="main" id="main">
	<div id="sidebar">
		<?php include "sidemenu_editor.php"; ?>
	</div>
	<?php include "manuscriptListView.php";?>
</div>

<div class="clear"></div>

<?php include "footer.php"; ?>


</body>
</html>
