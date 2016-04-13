<?php
include 'manutrack.php';
sess();

$manid=$_POST['manid'];
$partial="'".$_POST['partial']."'";
$roleid=$_SESSION['role_id'];

if ($_FILES["file"]["error"] > 0)
  {
  printf("Error: ".$_FILES["file"]["error"]);
  }
else
  {
  $docfilename="'".$_FILES["file"]["name"]."'";
  $doctype="'".$_FILES["file"]["type"]."'";
  $docsize=round(($_FILES["file"]["size"] / 1024), 2);
  
  //printf('<p>info: '.$docfilename.' '.$doctype.' '.$docsize.'</p>');
  
  move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $_FILES["file"]["name"]);

connect();

$success = mysql_query("INSERT INTO tbl_doc (doc_filename, doc_type, doc_size, man_id, full_partial) 

VALUES($docfilename,$doctype,$docsize,$manid,$partial)") 

or die(mysql_error());  


    if ($success == true) {
        
		
		if ($roleid==1){
			printf('<script type="text/javascript">
			alert("Your document has been uploaded to the NeWest Server.");	
			location.replace("viewmanuscript.php?manid='.$manid.'");
			</script>');
			}
			
			if ($roleid==2){
			printf('<script type="text/javascript">
			alert("Your document has been uploaded to the NeWest Server.");	
			location.replace("reviewer.php");
			</script>');
			}
			
			else{
			printf('<script type="text/javascript">
			alert("Your document has been uploaded to the NeWest Server.");	
			location.replace("mymanuscripts.php");
			</script>');
			}
		
    } 
     
     else {
       
        printf('<script type="text/javascript">
		alert("SQL Problem.");
		</script>');
		//location.replace("submit_doc.php");
     }
}

  
?>

	</div>
		<div id="sidebar">
		<?php $file=menuselect($_SESSION['role_id']); 
		include $file;
		?></div>
		<div id="footer">footer stuff</div>
    </div>
</body>
</html>