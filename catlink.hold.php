<?php
// Start the session
session_start();
?>
<html>
<head>
<title>Catlink</title>
 <link rel="stylesheet" href="css/ucket.css" type="text/css" />
</head>
<body>

 <?php

$servername = "localhost";
$username = "ucket";
$password = "buck3tl1st";
$dbname = "UCKET";
$NAME= $_SESSION["NAME"];
$NUM= $_SESSION["NUM"];




// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

	  ?> 
      


<div id="container">

    <div id="header">

<?php echo "OK, " . $_SESSION["NAME"] . ". this is your *ucket list. You can add things that we already have or create new ones. Your account number is  ";
	  ?> 
	</div>
<div id="content">
     
     
        	<?php include("includes/nav.txt"); ?>
    
     
     <div id="main">
 <table cellpadding=15>
 	<tr>
 		<td>
			<a href=seeitems.php?cat=3&num=<?php echo $NUM?>&name=<?php echo $NAME?>> 
				<img border="0" alt="where's the image?" src="images/categories/bridges.jpg" width="260">
			</a>
		</td>
		<td>
			<a href=seeitems.php?cat=4&num=<?php echo $NUM?>&name=<?php echo $NAME?>> 
				<img border="0" alt="where's the image?" src="images/categories/awards.jpg" width="260">
			</a>
		</td>
 </tr>
  <tr>
		<td>
			<a href=seeitems.php?cat=11&num=<?php echo $NUM?>&name=<?php echo $NAME?>> 
				<img border="0" alt="where's the image?" src="images/categories/family.jpg" width="260">
			</a>
		</td>
   
		<td>
			<a href=seeitems.php?cat=2&num=<?php echo $NUM?>&name=<?php echo $NAME?>> 
				<img border="0" alt="where's the image?" src="images/categories/beenthere.jpg" width="260">
			</a>
		</td>
 </tr>
  <tr>
		<td>
			<a href=seeitems.php?cat=1&num=<?php echo $NUM?>&name=<?php echo $NAME?>> 
				<img border="0" alt="where's the image?" src="images/categories/eatme.jpg" width="260">
			</a>
		</td>
		<td>
			<a href=seeitems.php?cat=15&num=<?php echo $NUM?>&name=<?php echo $NAME?>> 
				<img border="0" alt="where's the image?" src="images/categories/knowhow.jpg" width="260">
			</a>
		</td>
	</tr>
    <tr>
		<td>
            <a href=seeitems.php?cat=10&num=<?php echo $NUM?>&name=<?php echo $NAME?>> 
            	<img border="0" alt="where's the image?" src="images/categories/sexdrugs.jpg" width="260">
            </a>
        </td>
        <td>
            <a href=seeitems.php?cat=12&num=<?php echo $NUM?>&name=<?php echo $NAME?>> 
            	<img border="0" alt="where's the image?" src="images/categories/bling.jpg" width="260">
            </a>
        </td>
 </tr>
    <tr>
        <td>
            <a href=seeitems.php?cat=9&num=<?php echo $NUM?>&name=<?php echo $NAME?>> 
           	 	<img border="0" alt="where's the image?" src="images/categories/competition.jpg" width="260">
            </a>
        </td>
   
        <td>
            <a href=seeitems.php?cat=5&num=<?php echo $NUM?>&name=<?php echo $NAME?>> 
            	<img border="0" alt="where's the image?" src="images/categories/money.jpg" width="260">
            </a>
        </td>
 </tr>
    <tr>
        <td>
            <a href=seeitems.php?cat=14&num=<?php echo $NUM?>&name=<?php echo $NAME?>> 
            	<img border="0" alt="where's the image?" src="images/categories/fastcars.jpg" width="260">
            </a>
        </td>
        <td>
            <a href=seeitems.php?cat=&num=<?php echo $NUM?>&name=<?php echo $NAME?>> 
            	<img border="0" alt="where's the image?" src="images/categories/bodyofwork.jpg" width="260">
            </a>
        </td>
     </tr>
     <tr>
     
		<td>
		</td>
         <td>
            <a href=seeitems.php?cat=7&num=<?php echo $NUM?>&name=<?php echo $NAME?>> 
            	<img border="0" alt="where's the image?" src="images/categories/really.jpg" width="260">
            </a>
   		 </td>

		
</tr>
</table>

</div>

 <div id="footer">
     <?php include("includes/ucketfoot.txt"); ?>
    </div>