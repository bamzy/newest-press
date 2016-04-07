<title>Newest Manuscript Tracking System</title>
<link rel="stylesheet" type="text/css" href="./resources/jeasyui/themes/default/easyui.css">
<link rel="stylesheet" type="text/css" href="./resources/jeasyui/themes/icon.css">
<link rel="stylesheet" type="text/css" href="./resources/jeasyui/themes/color.css">
<link rel="stylesheet" type="text/css" href="./resources/jeasyui/demo/demo.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="newest.css">
<link rel="stylesheet" type="text/css" href="style.css">
<script type="text/javascript" src="./resources/jeasyui/jquery.min.js"></script>
<script type="text/javascript" src="./resources/jeasyui/jquery.easyui.min.js"></script>
<script type="text/javascript" src="js/edit.js"></script>
<?php
include "header.php";
include 'manutrack.php';
sess();
printf('<div id="sidebar" style="width: 150px;height: 700px">');
$file = menuselect($_SESSION['role_id']);
include $file;
printf('</div>');

printf('<p><span class="pagetitle">My Manuscripts</span></p>');
printf('<p>Please review our <a href="http://www.newestpress.com/catalog/content/view/18/32/" target="_blank">submission guidelines</a> before submitting a manuscript, then click "New Submission" in the side menu.</p>');
connect();
$per_id=$_SESSION['per_id'];
getmanper($per_id);

//Print_r ($_SESSION);
//printf('perid: '.$per_id.'');

?>


<!--		</p></div>-->
<!--		<div id="sidebar">-->
<!--		--><?php //$file=menuselect($_SESSION['role_id']);
//		include $file;
//		?><!--</div>-->

<?php include "footer.php"; ?>






    </div>
</body>
</html>
