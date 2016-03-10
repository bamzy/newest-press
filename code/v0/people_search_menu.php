<p><span class="pagetitle">Find an account</span></p>

<div id="inlinemenu">
<a href="accounts.php?search=getauthname">Active Users by Name</a>
<a href="accounts.php?search=getauthdate">Active Users By Date Created</a>
<a href="accounts.php?search=getauthuname">Active Users By Username</a>
</div>

<p></p><span class="searchbox">
 <form name="kwsearch" action="accounts.php" method="get">
               <table>
               <input type="hidden" value="authkw" name="search">
			   <tr><td>Author surname: </td><td><input type="text" size="30" maxlength="100" name="keywords"></td></tr>
			   <tr><td></td><td>exact <input type="radio" name="trunc" value="e" checked>&nbsp;starts with <input type="radio" name="trunc" value="t"></td></tr>
               <tr><td></td><td><input type="submit" value="Find Accounts"><br /></td></tr>
			  </table>
 </form>
</span><span class="searchbox">

<form name="getauthbyrole" action="accounts.php" method="get">
	<table><tr><td>Search by Role:</td><td>
	<input type="hidden" name="search" value="getauthbyrole"> 
	<select name="role" size="3">

<?php

connect();

$cloud = mysql_query("SELECT role_id, role_desc FROM tbl_role");

    while ($arr = mysql_fetch_assoc($cloud)){

    $roleid3=$arr['role_id'];
	$roletext=$arr['role_desc'];

    printf('<option value="'.$roleid3.'">'.$roletext.'</option>');

	 }

?>

</select></td></tr>

<tr><td></td><td><input type="submit" value="Find Accounts"></td></tr>

</table></form> </span>
