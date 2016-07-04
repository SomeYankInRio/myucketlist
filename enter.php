<?php
// Start the session
session_start();
$_SESSION["NAME"] = "";
$_SESSION["CAT"] = "";
$_SESSION["CAT_NAME"] = "";
$_SESSION["CAT_NUM"] = "";
$_SESSION["USER_NUM"] = "";
$_SESSION["NUM"] = "";
$_SESSION["USER_NAME"] = "";

?>


<html>
<head>
<title>Enter</title>
 <link rel="stylesheet" href="css/ucket.css" type="text/css" />
<!-- <link rel="stylesheet" href="css/style.css" type="text/css" /> -->
  <?php include("includes/catslides.txt"); 
	?>
 
</head>

<body>
  
  <?php

$servername = "localhost";
$username = "ucket";
$password = "buck3tl1st";
$dbname = "UCKET";
$NAME= $_GET["name"];



//see if this sets session cookie correctly
//session_set_cookie_params( $lifetime, '../krill/' );
//session_start();
//$_SESSION['name']='$NAME';
//header("Location: " . $_SERVER["HTTP_REFERER"]);


//above lines might be good


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

	  ?> 
      <?php

	// The value of the variable name is found
		//echo "Hi " . $_GET["name"] ." glad you stopped in";	

$sql = "SELECT * FROM USERS WHERE NAME='$NAME'";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
	
	 echo "";
   //  output data of each row
    while($row = $result->fetch_assoc()) {
       echo "";
			

$_SESSION["NUM"] = $row['NUM'] ;
$_SESSION["NAME"] = $row['NAME'] ;
$_SESSION["USER_NAME"] = $row['NAME'] ;
$_SESSION["NUM_LOGIN"] = $row['NUM_LOGIN']+1 ;
$NUM_LOGIN = $row['NUM_LOGIN']+1 ;


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

$sql1="UPDATE `UCKET`.`USERS` SET `ACTIVE` = '1' WHERE `USERS`.`NUM` =".$row["NUM"]."";
$sql2="UPDATE `UCKET`.`USERS` SET `NUM_LOGIN` = NUM_LOGIN+1 WHERE `USERS`.`NUM` =".$row["NUM"]."";
$sql3="UPDATE `UCKET`.`USERS` SET `JOINED` = NOW() WHERE `USERS`.`NUM` =".$row["NUM"]."";


mysql_select_db('UCKET');

$retval = mysql_query ($sql1, $conn);
$retval2 = mysql_query ($sql2, $conn);
$retval3 = mysql_query ($sql3, $conn);
if(! $retval )
{
  die('Sorry, but we cannot enter $NAME or $SENHA or $EMAIL as data ' . mysql_error());
}
				 
	}}
	?>	
  <div id="container">

<div id="header">



<?php if( $NUM_LOGIN < 2 ) 


{
					
					echo "OK, " . $_SESSION["NAME"] . ". Let's start putting things in your *ucket list. Click on a category below to use popular things others have chosen or <a href= additem.php>create new ones</a>. ";
						  ?> 
					
						
					</div>
					
					<div id="content">
						   
						<?php include("includes/nav.txt"); 
						?>
							<div id="main">
							 <?php	include("includes/nav2.txt"); 
									include("includes/nav3.txt"); 
						
					   
}
else
{

        
echo "</div><div id='content'>" ;
		
include("includes/nav.txt"); 
	
     	echo "<div id='main'>";
	 echo "Welcome back!
		
		<ul>
	<li> my latest list</li>
	
	<li> see the newest items people have added</li>
	
	<li> how do I look?</li>
	
	<li> lies, damned lies, and statistics</li>
		
		
		</ul>
		</table>
		
		";
echo "This is visit # " . $_SESSION["NUM_LOGIN"] . "";

   }
	 
	?>
</div>

        </div>
        }
   
    <div id="footer">
     <?php include("includes/ucketfoot.txt"); ?>
    </div>
   

