<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
try
{
	//Open database connection
	$con = new MySQLi("localhost","root","salam","newest");
	//$con = mysql_connect("localhost","root","salam");
	//mysql_select_db("newest", $con);
	//echo "hereeeee \n";
	//Getting records (listAction)
	if($_GET["action"] == "list")
	{
		//Get record count
		$query =("SELECT COUNT(*) AS RecordCount FROM reviewer;");
		$result = $con->query($query);
		//if($result === FALSE) {
		//	die(mysql_error()); // TODO: better error handling
		//}
		//$row = $result->fetch_array($result);
		$recordCount = $result->num_rows;
		//if ($recordCount != null)
		//	echo "hiii \n";
	    //else
	    //    echo "Nooooo \n";
		//echo $recordCount;
		//Get records from database
		//$result = mysql_query("SELECT * FROM manuscript ORDER BY " . $_GET["jtSorting"] . " LIMIT " . $_GET["jtStartIndex"] . "," . $_GET["jtPageSize"] . ";");
		//$result = mysql_query("SELECT * FROM manuscript ");
		$query = "SELECT * FROM reviewer ORDER BY " . $_GET["jtSorting"] . " LIMIT " . $_GET["jtStartIndex"] . "," . $_GET["jtPageSize"] ;
		//$query = "SELECT * FROM manuscript " ;
		$result = $con->query($query);
		//var_dump($result);
		//Add all records to an array
		$rows = array();
		$recordCount=0;
		while($row = $result->fetch_assoc())
		{
		    $recordCount++;
		    $rows[] = $row;
		}

		//Return result to jTable
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		$jTableResult['TotalRecordCount'] = $recordCount;
		$jTableResult['Records'] = $rows;
		print json_encode($jTableResult);
	}
	//Creating a new record (createAction)
	else if($_GET["action"] == "create")
	{
		//Insert record into database
		$result = mysql_query("INSERT INTO manuscript(Name, Age, RecordDate) VALUES('" . $_POST["Name"] . "', " . $_POST["Age"] . ",now());");
		
		//Get last inserted record (to return to jTable)
		$result = mysql_query("SELECT * FROM people WHERE PersonId = LAST_INSERT_ID();");
		$row = mysql_fetch_array($result);

		//Return result to jTable
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		$jTableResult['Record'] = $row;
		print json_encode($jTableResult);
	}
	//Updating a record (updateAction)
	else if($_GET["action"] == "update")
	{
		//Update record in database
		$result = mysql_query("UPDATE people SET Name = '" . $_POST["Name"] . "', Age = " . $_POST["Age"] . " WHERE PersonId = " . $_POST["PersonId"] . ";");

		//Return result to jTable
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		print json_encode($jTableResult);
	}
	//Deleting a record (deleteAction)
	else if($_GET["action"] == "delete")
	{
		//Delete from database
		$result = mysql_query("DELETE FROM people WHERE PersonId = " . $_POST["PersonId"] . ";");

		//Return result to jTable
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		print json_encode($jTableResult);
	}

	//Close database connection
	//mysql_close($con);
	mysqli_close($con);

}
catch(Exception $ex)
{
    //Return error message
	$jTableResult = array();
	$jTableResult['Result'] = "ERROR";
	$jTableResult['Message'] = $ex->getMessage();
	print json_encode($jTableResult);
}
	
?>