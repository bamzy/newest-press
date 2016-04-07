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
    <!--    <div id="sidebarMainManuscriptContainer">-->
    <!--
    <!---->
    <!--    </div>-->

    <!--    <div id="inlinemenu" >-->
    <!--        <a href="myreviews.php?search=newreviews">New Reviews</a>-->
    <!--        <a href="myreviews.php?search=recentreviews">Recent Reviews</a>-->
    <!--        <a href="myreviews.php?search=allreviews">All Reviews</a>-->
    <!--    </div>-->
    <div id="reviewerProfileContent">
        <?php
        include_once('manutrack.php');
        $per_id = $_SESSION['per_id'];
        //    if ($_GET['search']=='recentreviews'){
        //        getmanrevrecent($per_id);
        //    ($_GET['search']=='allreviews'){
        getmanrevall($per_id);
        //    }
        //    else{
        //        getmanrevnew($per_id);
        //    }


        ?>
    </div>

</section>

</body>
</html>