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


<?php
// Set session variables
$_SESSION["CAT"]=$_GET['cat'];
$CAT_NAME= $_SESSION["CAT_NAME"];
$NUM= $_SESSION["NUM"];

?>
   
<div id="container">

    <div id="header">
    	<h1><?php echo $_SESSION["NAME"]; ?>, This is the "<?php echo $_SESSION["CAT_NAME"]; ?>" *UCKET</h1>
        <h2>you can choose any of these, create your own, or see other categories</h2>
    </div>
    <div id="content">
        <div id="nav">
        	<?php include("includes/nav.txt"); ?>
        </div>
            
        <div id="main">    
        <?php
		
	if (!defined('PDO::ATTR_DRIVER_NAME'))
   echo 'PDO driver unavailable';
 
//$NUM=23;
//$CAT_NAME="been there";
		
		if (isset($_POST['ITEM_NAME']))
		{
				$pdo = new PDO("mysql:host=localhost;dbname=UCKET", "ucket", "buck3tl1st");
				
				// die(var_dump($_POST['ITEM_NAME']));
				foreach ($_POST['ITEM_NAME'] as $ITEM_NAME)
				{
						$query = $pdo->prepare("INSERT into LIST (NUM_USER, CATEGORY_NAME, ITEM_NAME) values ($NUM, '$CAT_NAME', :ITEM_NAME)");
						$query->bindParam('ITEM_NAME', $ITEM_NAME);
						$query->execute();
				}
		}
		
		?>
<form action="" method="post">






 <?php

				$servername = "localhost";
				$username = "ucket";
				$password = "buck3tl1st";
				$dbname = "UCKET";
				$NUM=$_GET['num'];
				//$NAME=$_GET['name'];
				//$CAT=$_GET['cat'];
				// Create connection
				$conn = new mysqli($servername, $username, $password, $dbname);
				// Check connection
				
				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
					
				} 
				
				//GET CATEGORY NAME to assign as session variable
				
				//$sql = "SELECT * FROM CATEGORY WHERE NUM='$CAT'";
				
				//$result = $conn->query($sql);
				
			//	if ($result->num_rows > 0) 
			//	{
			//		 while($row = $result->fetch_assoc()) {
			//			 $_SESSION["CAT_NAME"] = $row['NAME'] ;
			//	}
					
			//	}
				   
		//   else {
				//   echo "0 results for category number $CAT";
				//}
				

	$sql = "SELECT * FROM ITEM WHERE CATEGORY_NAME='$CAT_NAME' ORDER BY `ITEM`.`QUANTITY` DESC ";

	$result = $conn->query($sql);


	if ($result->num_rows > 0) {
    echo " <class='formset'>
	<table border=1>
 
	<tr>
		<th>
			Add to my list
		</th>
		<th>
			ITEMS
		</th>
		<th>
			Lists
		</th>
	
		<th> 
			
		</th>
	
	</tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>	

		<td> 
		<input type='checkbox' name='ITEM_NAME[]' value='".$row["NAME"]."'>
		</td>
		<td>
		
		<label>".$row["NAME"]."</label>
		
			 
		</td>
		<td> 
			".$row["QUANTITY"]."  
		</td>
		
		<TD>  
			Did it when? ".$row["DATE LATEST"]."  
		</td>
		
		</tr>";
  
    }
    echo "</table>";
	
	  
} else {
   echo "0 results for category $CAT_NAME";
}
$conn->close();

	  ?> 
      <!-- this form posts properly
       <input type="text" name="ITEM_NAME[]" ><br>
        <input type="text" name="ITEM_NAME[]" ><br>
        <input type="text" name="ITEM_NAME[]" ><br>
        <input type="text" name="ITEM_NAME[]" ><br>
        
        
        -->
        
        
        
        
        
        
        
        
        
        
        
        
        <input type="submit" name="save" ><br>
        </form>


 <?php echo "<a href= additem.php?cat=$NUM>Add new item</a>"; ?>

        </div>
    </div>
    <div id="footer">
     <?php include("includes/ucketfoot.txt"); ?>
    </div>
   
</div>
