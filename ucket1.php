<?php
// Start the session
session_start();
?>
<html>
<head>
<title>Show list of Categories</title>
 <link rel="stylesheet" href="style.css" type="text/css" media="screen" />
</head>
<body>
 <table><tr><td>
<?php

$servername = "localhost";
$username = "ucket";
$password = "buck3tl1st";
$dbname = "UCKET";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT 	* FROM CATEGORY";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    echo "<class='formset'>
	<table border=1>
 
	<tr><th>Categories 
</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>

		<TD> <a href=seecat.php?num=".$row["NUM"]."> ".$row["NAME"]." </A> </td>
		
		</tr>";
    }
    echo "</table>";
} else {
   echo "0 results";
}
$conn->close();

	  ?> 
      </td>
     </tr></table>  
      
<hr>



 <?php include("includes/ucketfoot.txt"); ?>