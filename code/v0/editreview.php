<?php
include_once('./model/mysqlConnection.php');
$rest_json = file_get_contents("php://input");
$_POST = json_decode($rest_json, true);
$_POST = parse_str($rest_json, $parameters);

session_start();



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
$user = $_SESSION['user'];


// get reccomendation text
$query = "SELECT * FROM tbl_rec";
$res = mysqlConnection::getConnection()->query($query);
while ($arr_rec = $res->fetch_assoc()) {
	$rec_text[] = $arr_rec['rec_text'];
}
//print_r($rec_text);
//echo $rec_text[$recid-1];
$body_rec = $rec_text[$recid-1];



// get editing requirement
$query = "SELECT * FROM tbl_editreq";
$res = mysqlConnection::getConnection()->query($query);
while ($arr_rec = $res->fetch_assoc()) {
	$edreq_text[] = $arr_rec['edreq_text'];
}
//print_r($edreq_text);
//echo $edreq_text[$edreqid-1];
$body_edreq = $edreq_text[$edreqid-1];

//$success = mysql_query("UPDATE tbl_review SET rec_id=$recid, edreq_id=$edreqid, comments=$comments, date_rec=CURDATE() where rev_id=$revid")
$query = "UPDATE tbl_review SET rec_id={$recid}, edreq_id={$edreqid}, comments={$comments}, date_rec=CURDATE() where rev_id={$revid}";
if (TRUE == mysqlConnection::getConnection()->query($query)) {



	printf('<script type="text/javascript">
	alert("Your review has been submitted. Thank you. Administrators will recieve an email about your review.");
	location.replace("newMyReview.php");
	</script>');
    $query = "SELECT email from tbl_notification";
    if (!$res = mysqlConnection::getConnection()->query($query)) {
        die('There was an error running the query [' . $query->error . ']');
    }


    require("./resources/phpMailer/class.phpmailer.php"); //下载的文件必须放在该文件所在目录
	$mail = new PHPMailer(); //建立邮件发送类

	$mail->IsSMTP(); // 使用SMTP方式发送
	$mail->CharSet='UTF-8';// 设置邮件的字符编码
	$mail->Host = "smtp.gmail.com"; // 您的企业邮局域名smtp.gmail.com.
	$mail->SMTPAuth = true; // 启用SMTP验证功能
	//$mail->SMTPSecure = "ssl";
	$mail->Port = "25"; //SMTP端口
	$mail->Username = "newest.huco530@gmail.com"; // 邮局用户名(请填写完整的email地址)
	$mail->Password = "huco530huco"; // 邮局密码
	$mail->From = "newest.huco530@gmail.com"; //邮件发送者email地址
    $mail->FromName = "Newest Press Notification";
    while ($row = $res->fetch_assoc()) {
        $mail->addAddress($row['email']);
    }
	$mail->IsHTML(true); // set email format to HTML //是否使用HTML格式
	$mail->Subject = "Newest Review Submission Notification"; //邮件标题
	$mail->Body = "Reviewer: $user<br><br>Recommendation: $body_rec <br><br>Editing requirement: $body_edreq<br><br> Reviewer comments: $comments"; //邮件内容

	if(!$mail->send())
	{
		echo "Failed. <p>";
		echo "Error: " . $mail->ErrorInfo;
		exit;
	}
//	echo "successfully\n\n\n";

}
     
else {
     
	printf('<script type="text/javascript">
	alert("There was problem with this update. Please try again.");
	location.replace("newMyReview.php");
	</script>');
        
}


//printf("<p>Hi there, ".$_SESSION['user'].". You're one of us now. Thanks for registering.</p>");

?>

