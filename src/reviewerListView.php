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
<script type="text/javascript" src="js/manuscript.js"></script>
<script type="text/javascript" src="js/reviewer.js"></script>
<script type="text/javascript" src="js/review.js"></script>
<script type="text/javascript" src="js/notification.js"></script>
<script type="text/javascript" src="js/author.js"></script>
<section>

    <div id="reviewerProfileContent">
    <span class="pagetitle">My Review </span>
        <?php
        include_once('manutrack.php');
        $per_id = $_SESSION['per_id'];
        getmanrevall($per_id);
        ?>
    </div>

</section>
<style type="text/csss">


</style>
