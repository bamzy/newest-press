<?php

$title = htmlspecialchars($_REQUEST['title']);
$author = htmlspecialchars($_REQUEST['author']);
$category = htmlspecialchars($_REQUEST['category']);
$content = htmlspecialchars($_REQUEST['content']);
$receivedDate = htmlspecialchars($_REQUEST['receivedDate']);

include 'conn.php';

$sql = "insert into manuscript(title,author,category,content,receivedDate) values('$title','$author','$category','$content','$receivedDate')";
$result = @mysql_query($sql);
if ($result) {
    echo json_encode(array(
        'id' => mysql_insert_id(),
        'title' => $title,
        'author' => $author,
        'category' => $category,
        'content' => $content,
        'receivedDate' => $receivedDate
    ));
} else {
    echo json_encode(array('errorMsg' => 'Some errors occured.'));
}
?>