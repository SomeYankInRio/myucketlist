<?php
// Start the session
session_start();
?>
<html>
<head>
<title>Insert multiple records</title>

</head>
<body>

 <?php

				$servername = "localhost";
				$username = "ucket";
				$password = "buck3tl1st";
				$dbname = "UCKET";
				$NUM=$_GET['num'];
				$conn = new mysqli($servername, $username, $password, $dbname);
				// Check connection
				
				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
					
				} 
				
$link = mysql_connect("localhost", "ucket", "buck3tl1st");
mysql_select_db("UCKET", $link);

$result = mysql_query("SELECT * FROM LIST WHERE NUM_USER= " . $_SESSION["NUM"] . "", $link);

			
				
	
	//$sql = "SELECT * FROM ITEM WHERE CATEGORY='$CAT' ORDER BY `ITEM`.`QUANTITY` DESC ";
	//$sql = "SELECT COUNT(ITEM_NAME)  FROM LIST";

	//$result = $conn->query($sql);
	
	$num_rows = mysql_num_rows($result);

echo "showing the first " . $_SESSION["NUM"] . "  of $num_rows Rows <a href=expand.php> see the rest</a>\n";



	  ?> 


</body>
</html>