<?php
// Start the session
session_start();
?>
<html>
<head>
<title>Adjust things a little bit</title>
 <link rel="stylesheet" href="css/ucket.css" type="text/css" />
 
<?php include("includes/catslides.txt"); 
	?>
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

//GET NUMBER IF ITEMS IN USERS LIST

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
						$query = $pdo->prepare("INSERT into LIST (NUM_USER, CATEGORY_NAME, ITEM_NAME, COMPLETED) values ($NUM, '$CAT_NAME', :ITEM_NAME, '$DATE')");
						$query->bindParam('ITEM_NAME', $ITEM_NAME);
						$query->execute();
					
					
						$query = $pdo->prepare("UPDATE `UCKET`.`ITEM` SET `QUANTITY` = QUANTITY+1 WHERE `NAME` ='$ITEM_NAME'");
						$query->bindParam('NAME', $ITEM_NAME);
						$query->execute();
				}
		}
		
?>
<?php
		  
// modify this to update records with date completed		  
		
	if (!defined('PDO::ATTR_DRIVER_NAME'))
  echo 'PDO driver unavailable';

		
		if (isset($_POST['LIST_NUM']))
	{
				$pdo = new PDO("mysql:host=localhost;dbname=UCKET", "ucket", "buck3tl1st");
				
			
				foreach ($_POST['LIST_NUM'] as $LIST_NUM)
				{
					$query = $pdo->prepare("DELETE from LIST WHERE `LIST`.`LIST_NUM` = $LIST_NUM");
					$query->bindParam('LIST_NUM', $LIST_NUM);
						$query->execute();
				}
		}
?>
<table border=1>
<?php		 		
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
 

        </div>
    </div>
    <div id="footer">
    
<?php include("includes/ucketfoot.txt"); ?>

    </div>
   
</div>
