

<html>
<head>
<title>Edit multiple records</title>
 
</head>
<body>

<?php



$con = mysql_connect('localhost', 'ucket', 'buck3tl1st' );
$db = mysql_select_db ( 'UCKET' , $con );
if ($db ==false )
	die(mysql_error() );
	
	if(isset($_POST["submit"]))
	{
	
	if(isset($_POST["delete"]))
	{
	
	$list = implode("," , $_POST["delete"]);	
	$sql=" delete from UCKET.user WHERE id IN ($list)";	
	mysql_query($sql) or die ( mysql_error());
		
		
	}
	

	
	echo '<pre>';
	print_r($_POST);
	echo '</pre>';
	
	foreach ( $_POST["ID"] AS $ID ) {
		echo 'ID is ' . $ID . '<br/>';
		echo 'usernme is ' . $_POST["username"][$ID] . "<br/>";
		echo 'password is ' . $_POST["password"] [$ID] . "<br/>";
	
	$username =mysql_real_escape_string( $_POST["username"][$ID]);
	$password = mysql_real_escape_string($_POST["password"][$ID]);
	$update = " UPDATE `UCKET`.`user` SET `username` = '$username',
`password` = '$password' WHERE `user`.`ID` =$ID;";
	mysql_query($update) or die( mysql_error());
	
	}
	}
	
	$sql = "select * from user ";
	$res = mysql_query( $sql ) or die (mysql_error() );
	
	if ( mysql_num_rows( $res)  > 0 ) {
		
		
	echo '<form method="post">';	
		
		
	while ($row=mysql_fetch_assoc($res) )
	{	
		echo 'ID : ' . $row["ID"]. '<br/>';
		echo 'username : <input type="text" name="username['. $row["ID"] .']" value="'.$row["username"].'"><br/>'."\n";
		echo 'password : <input type="text" name="password['. $row["ID"] .']" value="'.$row["password"].'"><br/>'."\n";
		echo '<input type="hidden" name="ID[]" value="'. $row["ID"] .'">'."\n";
		echo '<input type="checkbox" name="delete[]" value="'. $row["ID"] .'">'."\n";
		echo "<hr>\n";
		
		
	}
	echo '<input type="submit" name="submit" value="submit button text">';
	echo '</form>';
	
	}
	
?>


</body>
</html>