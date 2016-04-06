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
include_once('./model/mysqlConnection.php');
sess();
connect();
if ($_SESSION['role_id'] == 3) {
    printf('Only editors may view this page.');
    printf('<script type="text/javascript">
    location.replace("author.php");
    </script>');
}
printf('<div id="sidebar" style="width: 150px;min-height: 700px">');
$file = menuselect($_SESSION['role_id']);
include $file;
printf('</div>');
printf('<p><span class="pagetitle">Manuscript Full View</span></p>');
$manid = ($_GET['manid']);
$query = "SELECT title_orig, title_published, datestatus, SASE, active, let_id, genre, notes, stat_id, per_id, datesubmitted FROM tbl_manuscript WHERE man_id={$manid}";
if (!$res = mysqlConnection::getConnection()->query($query)) {
    die('There was an error running the query [' . $query->error . ']');
}
$arr = $res->fetch_assoc();
$perid = $arr['per_id'];
$author = authname($perid);
printf('
	<div class="manuscript">
	
	<table>
	<tr><td>Manuscript ref #:</td><td>' . $manid . '</td><td></td></tr>
	<tr><td>Author:</td><td>' . $author . '</a></td><td></td></tr>
	<tr><td>Title:</td><td>' . $arr['title_orig'] . '</td><td></td></tr>
	<tr><td>Genre:</td><td>' . $arr['genre'] . '</td><td></td></tr>
	<tr><td>Author Note:</td><td>' . $arr['notes'] . '</td><td></td></tr>');
printf('<tr><td>Date submitted:&nbsp;&nbsp;</td><td>' . $arr['datesubmitted'] . '</td><td></td></tr>');
getfileinfo($manid);
printf('</div>');
printf('<span class="manuside">');
if ($arr['active'] == 'Y') {
    printf('Active&nbsp;<br /><br />');
} else {
    printf('Inactive&nbsp;<br /><br />');
}
getstatnohtml($arr['stat_id']);

printf('</span>');

$perid = $_SESSION['per_id'];

$query = "SELECT rev_id FROM tbl_review WHERE per_id=$perid AND man_id={$manid}";
if (!$res = mysqlConnection::getConnection()->query($query)) {
    die('There was an error running the query [' . $query->error . ']');
}
$rows = $res->num_rows;


while ($arr3 = $res->fetch_assoc()) {

    getreviewedit($arr3['rev_id']);

}

?>


<?php include "footer.php"; ?>
</div>
</body>
</html>
