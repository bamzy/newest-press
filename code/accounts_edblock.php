

<div id="edblock">


<?php

connect();

$cloud = mysql_query("SELECT role_id, role_desc FROM tbl_role");

    while ($arr = mysql_fetch_assoc($cloud)){

    $roleid=$arr['role_id'];
	$roletext=$arr['role_desc'];

    printf('<option value="'.$roleid.'">'.$roletext.'</option>');

	 }

?>

</select></td></tr>

<tr><td></td><td><input type="submit" value="Set role"></td></tr>

</table></form> </span>
