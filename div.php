<?php
// Start the session
session_start();
?>
<html>
<head>
<title>Insert multiple records</title>
 <link rel="stylesheet" href="css/ucket.css" type="text/css" />
  <link rel="stylesheet" href="css/style.css" type="text/css" />
</head>
<body>

   
<div id="container">

    <div id="header">
    	<h1><?php echo $_SESSION["NAME"]; ?>, This is the "<?php echo $_SESSION["CAT_NAME"]; ?>" *UCKET</h1>
        <h2>you can choose any of these, create your own, or<a href="catlink.php"> see other categories</a></h2>
    </div>
    <div id="content">
        <div id="nav">
        	<?php include("includes/nav.txt"); ?>
        </div>
            
        <div id="main">    
      
redirect to mylist.php  
<hr>      
        
<form action="" method="post">

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
	
$sql = "SELECT COUNT(ITEM_NAME)  FROM LIST
";



	
$sql = "SELECT *
FROM `LIST`
GROUP BY ITEM_NAME
ORDER BY `LIST`.`ITEM_NAME` DESC";
	
	
	//$sql = "SELECT * FROM LIST ";

	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
    echo " <class='formset'>
	<table border=1>
 
	<tr>
		<th>ITEM NAME</th>
		<th>CATEGORY</th>
		<th>Lists</th>
		<th> </th>
	</tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>	
		
		<td>".$row["ITEM_NAME"]."</td>
		
		<td> ".$row["CATEGORY_NAME"]."  </td>
		<TD></TD>
		</tr>";
  
    }
    echo "</table>";
	
} else {
   echo "no results - something's wrong here.";
}
$conn->close();

	  ?> 
     
        <input type="submit" name="save" ><br>
        </form>
 <?php include("includes/add_item.txt"); ?>
 <?php //echo "<a href= additem.php?cat=$NUM>Add new item</a>"; ?>

        </div>
    </div>
    <div id="footer">
     <?php include("includes/ucketfoot.txt"); ?>
    </div>
   
</div>
