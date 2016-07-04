<?php
include "includes/db.php";
// Start the session
session_start();

?>
<html>
<head>
<title>Login</title>
 <link rel="stylesheet" href="css/ucket.css" type="text/css" />
  <!--<link rel="stylesheet" href="css/style.css" type="text/css" /> -->

</head>
<body>


<?php
	if (isset($_POST['NAME']))

			{	
				$servername = $SERVER_NAME;
				$username = "ucket";
				$password = "buck3tl1st";
				$dbname = "UCKET";
				$NAME=$_POST['NAME'];
				
				$SENHA=$_POST['SENHA'];
				// Create connection
				$conn = new mysqli($servername, $username, $password, $dbname);
				// Check connection
				
				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
					
				} 
				
				$sql = "SELECT * FROM USERS WHERE NAME='$NAME'";
				
				$result = $conn->query($sql);
				
				if ($result->num_rows > 0) 
				{
					 while($row = $result->fetch_assoc()) {
						// $_SESSION["CAT_NAME"] = $row['NAME'] ;
						// $_SESSION["CAT_NUM"] = $row['NUM'] ;
				}
					
				}
				   
		 else {
				// echo "bad login. try again ";
				 
		?>
        
        <form name="NAME" method="post" action="login2.php">
<div class="message">
<?php if($message!="") { echo $message; } ?></div>
<table border="0" cellpadding="10" cellspacing="1" width="500" align="center">
<tr class="tableheader">
<td align="center" colspan="2">Try Again</td>
</tr>
<tr class="tablerow">
<td align="right">Username</td>
<td><input type="text" name="NAME"></td>
</tr>
<tr class="tablerow">
<td align="right">Password</td>
<td><input type="password" name="password"></td>
</tr>
<tr class="tableheader">
<td align="center" colspan="2"><input type="submit" name="submit" value="Submit"></td>
</tr>
</table>
</form>
        
        <?php		 
				 
				 
				 
				}

			}
		else
		
		
		
		?>
		<form name="NAME" method="post" action="login2.php">
<div class="message">
<?php if($message!="") { echo $message; } ?></div>
<table border="0" cellpadding="10" cellspacing="1" width="500" align="center">
<tr class="tableheader">
<td align="center" colspan="2">Enter Login Details</td>
</tr>
<tr class="tablerow">
<td align="right">Username</td>
<td><input type="text" name="NAME"></td>
</tr>
<tr class="tablerow">
<td align="right">Password</td>
<td><input type="password" name="password"></td>
</tr>
<tr class="tableheader">
<td align="center" colspan="2"><input type="submit" name="submit" value="Submit"></td>
</tr>
</table>
</form>
		



</body></html>