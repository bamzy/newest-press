<?php
header('Content-Type: application/json');
function addNewReview($id, $idd)
{
    $function = $_POST["Method"];
    call_user_func($function);
}

$aResult = array();
if (isset($_POST["Method"])) {
    $function = $_POST["Method"];
    call_user_func($function);
}
if (!isset($_POST['functionName'])) {
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

return json_encode($aResult);

?>


