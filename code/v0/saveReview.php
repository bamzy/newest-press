<?php
//function  addNewReview($man_id,$per_id)
//{
//
//$fullNmae = htmlspecialchars($_REQUEST['name']);
//$phone = htmlspecialchars($_REQUEST['phone']);
//$email = htmlspecialchars($_REQUEST['email']);
//$address = htmlspecialchars($_REQUEST['address']);
//
//include 'conn.php';
//    return null;
////    $sql = "insert into review(name,phone,email,address) values('$man_id','$per_id')";
////    $result = @mysql_query($sql);
////    if ($result) {
////        echo json_encode(array(
////            'id' => mysql_insert_id(),
////
//////            'address' => $address
////        ));
////    } else {
////        echo json_encode(array('errorMsg' => 'Some errors occured.'));
////    }
//}
header('Content-Type: application/json');

$aResult = array();

if (!isset($_POST['functionname'])) {
    $aResult['error'] = 'No function name!';
}

if (!isset($_POST['arguments'])) {
    $aResult['error'] = 'No function arguments!';
}

if (!isset($aResult['error'])) {

    switch ($_POST['functionname']) {
        case 'add':
            if (!is_array($_POST['arguments']) || (count($_POST['arguments']) < 2)) {
                $aResult['error'] = 'Error in arguments!';
            } else {
                $aResult['result'] = add(floatval($_POST['arguments'][0]), floatval($_POST['arguments'][1]));
            }
            break;

        default:
            $aResult['error'] = 'Not found function ' . $_POST['functionname'] . '!';
            break;
    }

}

echo json_encode($aResult);

?>


