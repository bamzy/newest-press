<?php
include_once('./model/mysqlConnection.php');
$rest_json = file_get_contents("php://input");
$_POST = json_decode($rest_json, true);
$_POST = parse_str($rest_json, $parameters);

session_start();

printf('<html>
<head>
<!DOCTYPE html>
<title>NewWest Press - Manuscript Tracking System</title>
<link rel="stylesheet" href="newest.css" type="text/css">
</head>

<body> 
   <div id="wrap" class="main">
		<div id="header"></div>
		<div id="main"><p>');

include 'manutrack.php'; 
connect();

$revid = $parameters['revid'];
$edreqid = $parameters['edreqid'];
$recid = $parameters['recid'];
//$comments="'".mysql_real_escape_string( $parameters['comments'] )."'";
$comments = "'" . mysqlConnection::getConnection()->real_escape_string($parameters['comments']) . "'";

//printf('revid:'.$revid.'');
//printf('edreqid'.$edreqid.'');
//printf('recid'.$recid.'');
//printf('comments'.$comments.'');

//$success = mysql_query("UPDATE tbl_review SET rec_id=$recid, edreq_id=$edreqid, comments=$comments, date_rec=CURDATE() where rev_id=$revid")
$query = "UPDATE tbl_review SET rec_id={$recid}, edreq_id={$edreqid}, comments={$comments}, date_rec=CURDATE() where rev_id={$revid}";
if (TRUE == mysqlConnection::getConnection()->query($query)) {



	printf('<script type="text/javascript">
	alert("Your review has been submitted. Thank you.");
	location.replace("newMyReview.php");
	</script>');
    $query = "SELECT email from tbl_notification";
    if (!$res = mysqlConnection::getConnection()->query($query)) {
        die('There was an error running the query [' . $query->error . ']');
    }
    $subject = 'Newest Review Submission Notification';
    $message = 'hello';
    $headers = 'From: notifier@newestpress.com' . "\r\n" .
        'Reply-To: webmaster@example.com' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
    while ($row = $res->fetch_assoc()) {
        $to = $row['email'];
        mail($to, $subject, $message, $headers);
    }

}
     
else {
     
	printf('<script type="text/javascript">
	alert("There was problem with this update. Please try again.");
	location.replace("myreviews.php");
	</script>');
        
}


//printf("<p>Hi there, ".$_SESSION['user'].". You're one of us now. Thanks for registering.</p>");

?>

		</div> <!-- close main -->
		<div id="sidebar"><?php include 'sidemenu.php' ?></div>
		<div id="footer">footer stuff</div>
    </div>
</body>
</html>
