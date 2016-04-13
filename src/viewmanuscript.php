<?php

include 'manutrack.php';
sess();

printf('<p><span class="pagetitle">Manuscript Full View</span></p>');
connect();

		if ($_SESSION['role_id'] == 1){
		
		printf('Only editors may view this page.');
		printf('<script type="text/javascript">
			location.replace("author.php");
			</script>');
		}
		
		if ($_SESSION['role_id'] == 2){
		
		printf('Only editors may view this page.');
		printf('<script type="text/javascript">
			location.replace("reviewer.php");
			</script>');
		}
		
		
    $manid=($_GET['manid']);
       
    $cloud = mysql_query("SELECT title_orig, title_published, datestatus, SASE, active, disp_id, let_id, genre, notes, stat_id, per_id, datesubmitted FROM tbl_manuscript WHERE man_id=$manid") or die(mysql_error());

	$arr = mysql_fetch_assoc($cloud);
	$perid=$arr['per_id'];
	$author=authname($perid);
	printf('
	<span class="manuscript">
	
	<table>
	<tr><td>Manuscript ref #:</td><td>'.$manid.'</td><td></td></tr>
	<tr><td>Author:</td><td><a href="viewauthor.php?perid='.$perid.'">'.$author.'</a></td><td></td></tr>
	<tr><td>Title:</td><td>'.$arr['title_orig'].'</td><td></td></tr>
	<tr><td>Genre:</td><td>'.$arr['genre'].'</td><td></td></tr>
	<tr><td>Author Note:</td><td>'.$arr['notes'].'</td><td></td></tr>
	<tr><td>Date submitted:&nbsp;&nbsp;</td><td>'.$arr['datesubmitted'].'</td><td></td></tr>'); 
	getfileinfoedit($manid);
	printf('</span>');
	
    printf('<span class="manuside">');
    
			if ($arr['active'] == 'Y'){
			
			 printf('Active&nbsp;<span class="note"><a href="deactivate.php?manid='.$manid.'&active=N">(Make Inactive)</a></span><br /><br />');
			
			}
			
			else{
			
			  printf('Inactive&nbsp;<span class="note"><a href="deactivate.php?manid='.$manid.'&active=Y">(Make Active)</a></span><br /><br />');
			 
			}
	

	printf('<form name="changestatus" action="changestatus.php" method="post"><input type="hidden" value="'.$manid.'" name="manid"><select name="status" size="5">');

$cloud2 = mysql_query("SELECT stat_id, stat_text FROM tbl_status WHERE active LIKE 'Y'");

    while ($arr2 = mysql_fetch_assoc($cloud2)){

    $statid2=$arr2['stat_id'];
	$stattext=$arr2['stat_text'];
	
			if ($statid2==$arr['stat_id']){
			printf('<option selected value="'.$statid2.'">'.$stattext.'</option>');
			}
			
			else {
		
			printf('<option value="'.$statid2.'">'.$stattext.'</option>');
		
			 }
          
     }     
     
     printf('</select><br /><input type="submit" value="Change Status"></form><span class="note">last updated:<br />'.$arr['datestatus'].'</span>');
     printf('</span>');
     
     printf('<p><span class="pagetitle">Reviews</span></p>');
     
     $cloud3 = mysql_query("SELECT rev_id FROM tbl_review WHERE man_id=$manid order by rev_no");
     $rows = mysql_num_rows($cloud3);
     
if ($rows<1){
    			
				printreviewblock($manid, 1);
				printreviewblock($manid, 2);
				printreviewblock($manid, 3);
}
    
else{

	$cloud4 = mysql_query("SELECT rev_no FROM tbl_review WHERE man_id=$manid order by rev_no");
	
		   $fixrevorder=array();
		   
	       while ($arr4 = mysql_fetch_assoc($cloud4)){
			 
		   array_push($fixrevorder, $arr4['rev_no']);
			  
		   }      
			
			//print_R($fixrevorder);
     
     if ($rows==3){
     
		   while ($arr3 = mysql_fetch_assoc($cloud3)){
			 
		   getreview($arr3['rev_id']);
			  
		   }      
		 
     }
     
     
     if ($rows==2){
     
     		if ($fixrevorder[0]==1 && $fixrevorder[1]==2){
     
					while ($arr3 = mysql_fetch_assoc($cloud3)){
					 
					getreview($arr3['rev_id']);
					  
				   } 
			printreviewblock($manid, 3);
			
			}	   
     		
     		if ($fixrevorder[0]==1 && $fixrevorder[1]==3){
     		
					while ($arr3 = mysql_fetch_assoc($cloud3)){
					 
					getreview($arr3['rev_id']);
					  
				   } 
			printreviewblock($manid, 2);
			
			}	   
     		
     }
     
     
     if ($rows==1){
     
			   if ($fixrevorder[0]==1){
		 
					   while ($arr3 = mysql_fetch_assoc($cloud3)){
						 
					   getreview($arr3['rev_id']);
					
					   }
			
				printreviewblock($manid, 2);
				
				printreviewblock($manid, 3);
				
     		   }
     		   
     		    if ($fixrevorder[0]==2){
		 		
		 		printreviewblock($manid, 1);
		 			
					   while ($arr3 = mysql_fetch_assoc($cloud3)){
						 
					   getreview($arr3['rev_id']);
					
					   }
			
				printreviewblock($manid, 3);
				
     		   }
     		   
     		   if ($fixrevorder[0]==3){
		 		
		 		printreviewblock($manid, 1);
				
				printreviewblock($manid, 2);
		 			
					   while ($arr3 = mysql_fetch_assoc($cloud3)){
						 
					   getreview($arr3['rev_id']);
					
					   }
				
     		   }
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
