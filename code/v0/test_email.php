
	<?php

require("PHPMailer/class.phpmailer.php"); //下载的文件必须放在该文件所在目录
$mail = new PHPMailer(); //建立邮件发送类
//$address = $_POST['address'];
$address = array();
$address[] = 'wwei1@ualberta.ca';
$address[] = 'aghilide@ualberta.ca';
$address[] = 'ekaitlyn@ualberta.ca';
$address[] = 'ndilukie@ualberta.ca';

$mail->IsSMTP(); // 使用SMTP方式发送
$mail->CharSet='UTF-8';// 设置邮件的字符编码
$mail->Host = "smtp.gmail.com"; // 您的企业邮局域名smtp.gmail.com.
$mail->SMTPAuth = true; // 启用SMTP验证功能
//$mail->SMTPSecure = "ssl";
$mail->Port = "25"; //SMTP端口
$mail->Username = "newest.huco530@gmail.com"; // 邮局用户名(请填写完整的email地址)
$mail->Password = "huco530huco"; // 邮局密码
$mail->From = "newest.huco530@gmail.com"; //邮件发送者email地址
$mail->FromName = "Newest";
$mail->AddAddress("$address[0]", "");//收件人地址，可以替换成任何想要接收邮件的email信箱,格式是AddAddress("收件人email","收件人姓名")
$mail->AddAddress("$address[1]", "");
$mail->AddAddress("$address[2]", "");
$mail->AddAddress("$address[3]", "");
//$mail->AddReplyTo("", "");
//$mail->AddAttachment("/var/tmp/file.tar.gz"); // 添加附件
//$mail->IsHTML(true); // set email format to HTML //是否使用HTML格式
$mail->Subject = "PHPMailer-test email server"; //邮件标题
$mail->Body = "Hello, I am Wei. this is a test email. I created a gmail for our project: newest.huco530@gmail.com Password is: huco530huco "; //邮件内容
$mail->AltBody = "This is the body in plain text for non-HTML mail clients"; //附加信息，可以省略

if(!$mail->send())
{
echo "Failed. <p>";
echo "Error: " . $mail->ErrorInfo;
exit;
}
echo "successfully\n\n\n";





	?>