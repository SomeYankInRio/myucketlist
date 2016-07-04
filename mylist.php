<?php
// Start the session
session_start();
?>
	<html>
		<head>
			<title>My List</title>
            <!--<link rel="stylesheet" href="css/table.css" type="text/css" />
             <link rel="stylesheet" href="css/style.css" type="text/css" /> -->
 				<link rel="stylesheet" href="css/ucket.css" type="text/css" />
				
   <?php include("includes/catslides.txt"); 
	?>
        
        </head>
		<body onLoad="init()">

<div id="container">

    <div id="header">
    	 <?php echo "OK, " . $_SESSION["NAME"] . ". Here's your *ucket list so far. ";
	  		?> 
    </div>
    <div id="content">
             
         <?php

			$servername = "localhost";
			$username = "ucket";
			$password = "buck3tl1st";
			$dbname = "UCKET";
			$NUM_USER=$_GET['num'];
			$NAME=$_GET['name'];
			$CAT_NUM= $_SESSION['CAT_NUM'];

// Create connection

			$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
		if ($conn->connect_error) {
   			 die("Connection failed: " . $conn->connect_error);
			} 
			
// Inserts new item

		if(isset($_POST['add']))
			{
			$servername = "localhost";
			$username = "ucket";
			$password = "buck3tl1st";
			$dbname = "UCKET";
			$dbhost = 'localhost';
			$dbuser = 'ucket';
			$dbpass = 'buck3tl1st';
			$conn = mysql_connect($dbhost, $dbuser, $dbpass);
		if(! $conn )
			{
  			die('Could not connect: ' . mysql_error());
			}

			{

			$NAME= $_POST['name'];
			$CAT_NAME= $_SESSION['CAT_NAME'];
			$ITEM_NAME= $_POST['ITEM_NAME'];
			$NUM= $_SESSION["NUM"] ;
			$NUM_USER= $_SESSION["USER_NUM"]; 
			
			}
						   
			$sql1 = "INSERT INTO ITEM".
			   "(
				NAME,
				CATEGORY_NAME,
				CATEGORY)".
		
			   "VALUES (
				'$ITEM_NAME',
				'$CAT_NAME',
				'$CAT_NUM' )";
				
			$sql2 = "INSERT INTO LIST".
			   "(NUM_USER,
				ITEM_NAME,
				CATEGORY_NAME)".
		
			   "VALUES ('$NUM_USER',
				'$ITEM_NAME',
				'$CAT_NAME' )";
							   
				   				   				   	   
			mysql_select_db('UCKET');
			$retval = mysql_query ($sql1, $conn);
			$retval2 = mysql_query ($sql2, $conn);
			
			
		 $to = "cornelius.conboy@gmail.com"; 
         $message = "<b>" . $_SESSION["NAME"] . " put a new item on their *ucket list</b>";
         $message .= "<h1>$NAME</h1>";
		 $message .= "<H1>" . $_SESSION["NAME"] . "</H1>";
		 
		 $message .= " added<b> $ITEM_NAME </b>to their list. It went into the category<br><b> $CAT_NAME. \n\n";
		 $message .= "<br>check and see if it overlaps or duplicates something already in the database and make sure <b>$CAT_NAME</b> is the best category for it. If it's not remember to change the category number as well as the name in the db";
         $subject = "" . $_SESSION["NAME"] . "  put a new item on their *ucket list";
         $header = "From:cornelius.conboy@gmail.com \r\n";
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
         
         $retval = mail ($to,$subject,$message,$header);
         
         if( $retval == true ) {
            echo "Go take a look...$NAME or  " . $_SESSION["NAME"] . " ";
			include("includes/mylist.txt");
			
			
         }else {
            echo "Problem sending the email...";
         }
		
		if(! $retval)
			{
			  die('Sorry, but we cannot enter ". $_SESSION["CAT_NAME"] . " or $item_name  ' . mysql_error());
			}
			}
			else
			
			{

	include("includes/nav.txt"); 
	?>
     
     	<div id="main"> 
        
	<?php
		  
// modify this to update records with date completed		  
		
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
      
<hr>
 
<?php //include("includes/add_item.txt"); ?>
  
</div>
    </div>
    <div id="footer">
     <?php include("includes/ucketfoot.txt"); ?>
    </div>

<?php
}
?>

