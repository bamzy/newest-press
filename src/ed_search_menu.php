<p><span class="pagetitle">Manuscript Search</span></p>

<div id="inlinemenu">
<a href="manuscripts.php?search=getmanactiveall">Active Manuscripts</a>
<a href="manuscripts.php?search=getmanbyauth">By Author</a>
<a href="manuscripts.php?search=getmanbydateall">By Date</a>
<a href="manuscripts.php?search=getmanall">All Manuscripts</a>
</div>

<p></p><span class="searchbox">
 <form name="kwsearch" action="manuscripts.php" method="get">
               <table>
               <input type="hidden" value="manukw" name="search">
               <tr><td>Search in: </td><td><select name="field" size="3">
               <option value="man_id" selected="selected">Manuscript Ref #</option>
               <option value="title_orig">Manuscript Title</option>
               <option value="notes">Manuscript Notes</option>
               </td></tr>
			   <tr><td>Keywords: </td><td><input type="text" size="30" maxlength="100" name="keywords"></td></tr>
               <tr><td></td><td><input type="submit" value="Find Manuscripts"></td></tr>
			  </table>
 </form>
</span><span class="searchbox">
<form name="getforum" action="manuscripts.php" method="get">
	<table><tr><td>Search by Status:</td><td>
	<input type="hidden" name="search" value="getmanbystatus"> 
	<select name="status" size="5">

<?php

connect();

$cloud = mysql_query("SELECT stat_id, stat_text FROM tbl_status WHERE active LIKE 'Y'");

    while ($arr = mysql_fetch_assoc($cloud)){

    $statid=$arr['stat_id'];
	$stattext=$arr['stat_text'];

    printf('<option value="'.$statid.'">'.$stattext.'</option>');

	 }

?>

</select></td></tr>

<tr><td></td><td><input type="submit" value="Find Manuscripts"></td></tr>

</table></form> </span>

<p></p>
<span class="searchbox">
Date Submitted
<form name="getforum" action="manuscripts.php" method="get">
<input type="hidden" name="search" value="getmanbydate">
<table><tr>
<td>From:</td><td><input type="text" size="9" maxlength="100" name="from"></td>
<td>To:</td><td><input type="text" size="9" maxlength="100" name="to"></td>
</tr>
<tr><td></td><td>dd/mm/yy</td><td></td><td>dd/mm/yy</td></tr>
<tr><td></td><td></td><td></td><td><input type="submit" value="Find Manuscripts"></td></tr>
</table>
</form>
</span>
