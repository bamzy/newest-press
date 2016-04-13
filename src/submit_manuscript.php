<?php
include 'manutrack.php';
sess2();
?>

    <link rel="stylesheet" type="text/css" href="./resources/jeasyui/themes/default/easyui.css">
    <link rel="stylesheet" type="text/css" href="./resources/jeasyui/themes/icon.css">
    <link rel="stylesheet" type="text/css" href="./resources/jeasyui/themes/color.css">
    <link rel="stylesheet" type="text/css" href="./resources/jeasyui/demo/demo.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="newest.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script type="text/javascript" src="./resources/jeasyui/jquery.min.js"></script>
    <script type="text/javascript" src="./resources/jeasyui/jquery.easyui.min.js"></script>
<link rel="stylesheet" href="newest.css" type="text/css">

<script type="text/javascript">

function validateForm() {

var title=document.forms["manuinfo"]["title"].value;
	 
   if (title==null || title=="") 
   { 
      alert('You must enter a working title for your manuscript.') 
      document.forms["manuinfo"]["title"].focus(); 
      return false; 
   } 
 	
return true;

}

</script>

<?php include'header.php'?>

		
<div id="main" class="main">
<div id="sidebar">
		<?php $file=menuselect($_SESSION['role_id']); 
		include $file;
		?></div>
<!--<?php
connect();

$uid=$_SESSION['per_id'];
$urole=$_SESSION['role_id'];

printf ('<p>You are logged in as <span class="username">'.$_SESSION['user'].'</span>.</p>');

?>-->

    <p><span class="pagetitle">Enter Manuscript Information:</span></>
    <!--	<form name="manuinfo" action="addmanu.php" onsubmit="return validateForm();" method="post" >-->
    <!--		<table>-->
    <!--		--><?php //
    //
    //			if ($_SESSION['role_id']==3){
    //			printf('<tr><td>Select User:</td><td>Not written yet</td></tr>');
    //			}
    //
    //			else{
    //			printf('<tr><td></td><td><input type=hidden name="uid" value="'.$uid.'"></td></tr>');
    //			}
    //
    //		?>
    <!--		<tr><td></td><td><input type="hidden" name="statid" value=1></td></tr>-->
    <!--		<tr><td></td><td><input type="hidden" name="active" value='Y'></td></tr>-->
    <!--		<tr><td>Title:</td><td><input type="text" name="title" size=75 ></td></tr>-->
    <!--		<tr><td>Genre:</td><td><input type="text" name="genre" size=50 ></td></tr>-->
    <!--		<tr><td>Notes:</td><td><textarea name="notes" cols=50 rows=4></textarea></td></tr>-->
    <!--		<tr><td></td><td><input type="submit" value="submit"></td></tr>-->
    <!--		</table>-->
    <!--	</form>-->
    <!--	<div style="padding:3px 2px;border-bottom:1px solid #ccc">Form Validation</div>-->
    <div id="dlg" class="easyui-dialog" style="width:500px;height:250px;padding:10px 30px;"
         title="Register" buttons="#dlg-buttons">
        <h2>Account Information</h2>
        <form id="ff" method="post">
            <table>
                <tr>
                    <td>Name:</td>
                    <td><input type="text" name="name" style="width:350px;"/></td>
                </tr>
                <tr>
                    <td>Address:</td>
                    <td><input type="text" name="address" style="width:350px;"/></td>
                </tr>
                <tr>
                    <td>City:</td>
                    <td><select class="easyui-combotree" url="data/city_data.json" name="city" style="width:156px;"/>
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <div id="dlg-buttons">
        <a href="#" class="easyui-linkbutton" iconCls="icon-ok" onclick="savereg()">Submit</a>
        <a href="#" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')">Cancel</a>
    </div>


</div>
		
    </div>
<?php include 'footer.php' ?>