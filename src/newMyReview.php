<?php
include "header.php";
include_once('manutrack.php');
sess();
connect();
?>

<div class="main" id="main">
<div id="sidebar">
    <?php include "sidemenu_reviewer.php"; ?>
</div>
    <?php include "reviewerListView.php"; ?>
</div>

<div class="clear"></div>

<?php include "footer.php"; ?>


</body>
</html>
