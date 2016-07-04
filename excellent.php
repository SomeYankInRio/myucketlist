<?php
// Start the session
session_start();
?>
<html>
<head>
<title>Insert multiple records</title>
 <link rel="stylesheet" href="css/ucket.css" type="text/css" />
 <!--  <link rel="stylesheet" href="css/style.css" type="text/css" /> -->
 
 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
	<script>
		$(function() {

			$("#slideshow > div:gt(0)").hide();

			setInterval(function() {
			  $('#slideshow > div:first')
			    .fadeOut(1000)
			    .next()
			    .fadeIn(1000)
			    .end()
			    .appendTo('#slideshow');
			},  3000);

		});
	</script>
     
 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
	<script>
		$(function() {

			$("#slideshow2 > div:gt(0)").hide();

			setInterval(function() {
			  $('#slideshow2 > div:first')
			    .fadeOut(600)
			    .next()
			    .fadeIn(600)
			    .end()
			    .appendTo('#slideshow2');
			},  3000);

		});
	</script>
     <script src="//ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
	<script>
		$(function() {

			$("#slideshow3 > div:gt(0)").hide();

			setInterval(function() {
			  $('#slideshow3 > div:first')
			    .fadeOut(300)
			    .next()
			    .fadeIn(300)
			    .end()
			    .appendTo('#slideshow3');
			},  3000);

		});
	</script>
</head>
<body>

<?php
//GET CATEGORY NAME to assign as session variable
				
				$servername = "localhost";
				$username = "ucket";
				$password = "buck3tl1st";
				$dbname = "UCKET";
				$NUM=$_GET['num'];
				$CAT=$_GET['cat'];
				// Create connection
				$conn = new mysqli($servername, $username, $password, $dbname);
				// Check connection
				
				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
					
				} 
				$sql = "SELECT * FROM CATEGORY WHERE NUM='$CAT'";
				
				$result = $conn->query($sql);
				
				if ($result->num_rows > 0) 
				{
					 while($row = $result->fetch_assoc()) {
						 $_SESSION["CAT_NAME"] = $row['NAME'] ;
						 $_SESSION["CAT_NUM"] = $row['NUM'] ;
				}	
				}			   
		 else {
				 echo "No results for category ";
				}

// Set session variables
$_SESSION["CAT"]=$_GET['cat'];
$CAT_NAME= $_SESSION["CAT_NAME"];
$NUM= $_SESSION["NUM"];

?>
   
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
        <?php
		
	if (!defined('PDO::ATTR_DRIVER_NAME'))
   echo 'PDO driver unavailable';

		
		if (isset($_POST['ITEM_NAME']))
		{
				$pdo = new PDO("mysql:host=localhost;dbname=UCKET", "ucket", "buck3tl1st");
				
				// die(var_dump($_POST['ITEM_NAME']));
				foreach ($_POST['ITEM_NAME'] as $ITEM_NAME)
				{
						
						$DATE =$_POST['DATE'];
						$query = $pdo->prepare("UPDATE `UCKET`.`ITEM` SET `COMPLETED` = $DATE WHERE `NAME` ='$ITEM_NAME'");
						$query->bindParam('NAME', $ITEM_NAME);
						$query->execute();
					
						//$query = $pdo->prepare("UPDATE ITEM SET 'QUANTITY' = '8' WHERE ITEM_NAME= '$ITEM_NAME'");
						//$query->bindParam('ITEM_NAME', $ITEM_NAME);
						//$query->execute();
				}
		}
		
		?>
        
        
		
		<?php
		  
// modify this to update records with date completed		  
		
echo " Date is '$DATE";	
	
	if (!defined('PDO::ATTR_DRIVER_NAME'))
  echo 'PDO driver unavailable';

		
		if (isset($_POST['LIST_NUM']))
	{
				$pdo = new PDO("mysql:host=localhost;dbname=UCKET", "ucket", "buck3tl1st");
				
			//die(var_dump($_POST['LIST_NUM']));
				foreach ($_POST['LIST_NUM'] as $LIST_NUM)
				{
					$query = $pdo->prepare("DELETE from LIST WHERE `LIST`.`LIST_NUM` = $LIST_NUM");
					$query->bindParam('LIST_NUM', $LIST_NUM);
						$query->execute();
				}
		}
		
include("includes/mylist.txt"); ?>     
        
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
	
	$sql = "SELECT * FROM ITEM WHERE CATEGORY='$CAT' ORDER BY `ITEM`.`QUANTITY` DESC ";

	$result = $conn->query($sql);


	if ($result->num_rows > 0) {
    echo " <class='formset'>
	
 
	<tr>
		<th><b>$CAT_NAME </b>stuff not on my list</th>
		
		<th colspan=2>on this many others</th>
		<th>I want it </th>
	</tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>	
		<td>
		<label>".$row["NAME"]."</label></td>
		<td colspan=2> ".$row["QUANTITY"]." </td>
		
		<td><input type='checkbox' name='ITEM_NAME[]' value='".$row["NAME"]."'>
		</td>
		</tr>";
  
    }
    echo "";
	
} else {
  // echo "0 results for category $CAT_NAME";
}
$conn->close();

	  ?> 
     <tr><td>
        <input type="submit" name="save" value="Adjust my list a bit" ><br>
        </form>
        </td>
        <td colspan=4>
        </td></tr>
        </table>
 <?php include("includes/add_item.txt"); ?>
 <?php //echo "<a href= additem.php?cat=$NUM>Add new item</a>"; ?>

        </div>
    </div>
    <div id="footer">
     <?php include("includes/ucketfoot.txt"); ?>
    </div>
   
</div>
