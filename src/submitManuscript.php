<?php
header('Content-Type: text/plain; charset=utf-8');
$rest_json = file_get_contents("php://input");
//$_POST = json_decode($rest_json, true);
//$_POST = parse_str($rest_json);
$title = htmlspecialchars($_POST['title']);
$category = htmlspecialchars($_POST['category']);
$uploadedFile = $_FILES['uploadedFile'];
$notes = htmlspecialchars($_POST['notes']);
$per_id = $_POST['per_id'];
if ($per_id == null)
	die('Wrong Parameters in your request');
include './model/mysqlConnection.php';


//$target_dir = "uploads/";
//$target_file = $target_dir . basename($_FILES["uploadedFile"]["name"]);
//$uploadOk = 1;
//$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image


try {


	$target_dir = "./upload/";
	$fileName = $_FILES["uploadedFile"]["name"];
	$target_file = $target_dir . basename($fileName);
	$uploadOk = 1;
	$docFileType = pathinfo($target_file, PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
	if (isset($_POST["submit"])) {
		$check = getimagesize($_FILES["uploadedFile"]["tmp_name"]);
		if ($check !== false) {
			echo "File is an image - " . $check["mime"] . ".";
			$uploadOk = 1;
		} else {
			echo "File is not an image.";
			$uploadOk = 0;
		}
	}

// Check if file already exists
	if (file_exists($target_file)) {
		echo "Sorry, file already exists.";
		echo json_encode(array('errorMsg' => 'Sorry, file already exists.'));
		$uploadOk = 0;
		die();
	}
// Check file size
	$fileSize = $_FILES["uploadedFile"]["size"];
	if ($fileSize > 50000000) {
		echo "Sorry, your file is too large.";
		echo json_encode(array('errorMsg' => 'Sorry, your file is too large.'));
		$uploadOk = 0;
		die();
	}
// Allow certain file formats
	if ($docFileType != "pdf" && $docFileType != "docx" && $docFileType != "doc"
		&& $docFileType != "gif"
	) {
		echo "Sorry, only PDF, DOC & DOCX files are allowed.";
		echo json_encode(array('errorMsg' => 'Sorry, only PDF, DOC & DOCX files are allowed.'));
		$uploadOk = 0;
		die();
	}
// Check if $uploadOk is set to 0 by an error

// if everything is ok, try to upload file

	if (move_uploaded_file($_FILES["uploadedFile"]["tmp_name"], $target_file)) {
//			echo "The file ". basename( $_FILES["uploadedFile"]["name"]). " has been uploaded.";
	} else {
		echo "Sorry, there was an error uploading your file.";
		echo json_encode(array('errorMsg' => 'Sorry, there was an error uploading your file.'));
		die();
	}


	$uploadedFile = file_get_contents($target_file);
	$uploadedFile = addslashes($uploadedFile);
	$currentTime = date("Y-m-d H:i:s");
	$query = "insert into tbl_manuscript(per_id,stat_id,dateSubmitted, dateStatus, title_orig, genre,notes ) values('{$per_id}','1','{$currentTime}','{$currentTime}','{$title}','{$category}','{$notes}')";
	if (!$res = mysqlConnection::getConnection()->query($query)) {
		die('There was an error running the query [' . $query->error . ']');
	}
	$result = mysqlConnection::getConnection()->insert_id;
//    echo $result;
	$query = "insert into tbl_doc(doc_size,doc_filename,doc_date, full_partial, doc_type, man_id) values('{$fileSize}','{$fileName}','{$currentTime}','F','{$_FILES['uploadedFile']['type']}','{$result}')";
	if (!$res = mysqlConnection::getConnection()->query($query)) {
		die('There was an error running the query [' . $query->error . ']');
	}
	if ($res) {
		echo json_encode(array(
			'id' => mysqlConnection::getConnection()->insert_id

		));
	} else {
		echo json_encode(array('errorMsg' => 'Some errors occured.'));
	}

} catch (RuntimeException $e) {

	echo $e->getMessage();

}


?>