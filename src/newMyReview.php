<?php

include_once('manutrack.php');
sess();
connect();
include 'header.php';

?>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.js"></script>
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
