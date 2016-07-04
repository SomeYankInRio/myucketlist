<?php
// Start the session
session_start();
?>
	<html>
		<head>
			<title>My List</title>
            <link rel="stylesheet" href="css/table.css" type="text/css" />
 				<link rel="stylesheet" href="css/ucket.css" type="text/css" />
				 <link rel="stylesheet" href="css/style.css" type="text/css" />
        
        </head>
		<body onLoad="init()">



<div id="container">

    <div id="header">
    	 <?php echo "OK, " . $_SESSION["NAME"] . ". Here's your *ucket list so far. ";
	  		?> 
    </div>
    <div id="content">

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
	$sql=" delete from UCKET.LIST WHERE LIST_NUM IN ($list)";	
	mysql_query($sql) or die ( mysql_error());
				
	}
		
	echo '<pre>';
	print_r($_POST);
	echo '</pre>';
	
	foreach ( $_POST["LIST_NUM"] AS $LIST_NUM ) {
		echo 'LIST_NUM is ' . $LIST_NUM . '<br/>';
		echo 'I did this: ' . $_POST["ITEM_NAME"][$LIST_NUM] . "<br/>";
		echo 'on: ' . $_POST["COMPLETED"] [$LIST_NUM] . "<br/>";
		
		
		
		$ITEM_NAME =mysql_real_escape_string( $_POST["ITEM_NAME"][$LIST_NUM]);
		$COMPLETED = mysql_real_escape_string($_POST["COMPLETED"][$LIST_NUM]);
	
		if(empty($COMPLETED)) 
		{
   			$update = " UPDATE `UCKET`.`LIST` SET `COMPLETED` = NULL WHERE `LIST`.`LIST_NUM` =$LIST_NUM;";
		} 
		else 
		{
  			 $update = " UPDATE `UCKET`.`LIST` SET `COMPLETED` = '$COMPLETED' WHERE `LIST`.`LIST_NUM` =$LIST_NUM;";
		}
		
		
	
	//$update = " UPDATE `UCKET`.`LIST` SET `COMPLETED` = '$COMPLETED' WHERE `LIST`.`LIST_NUM` =$LIST_NUM;";
	mysql_query($update) or die( mysql_error());
	
	}
	}
	
	//$sql = "select * from LIST ";
	
	$sql = "SELECT * FROM LIST WHERE COMPLETED IS NULL AND  NUM_USER=". $_SESSION["NUM"] ."
		ORDER BY `LIST`.`ITEM_NAME` ASC";
		
	
	$res = mysql_query( $sql ) or die (mysql_error() );
	
	if ( mysql_num_rows( $res)  > 0 ) {
		
		
	echo '<form method="post">';	
		
		
	while ($row=mysql_fetch_assoc($res) )
	{	
		echo 'LIST_NUM : ' . $row["LIST_NUM"]. '<br/>';
		echo 'I did this : ' . $row["ITEM_NAME"]. '<br/>';
		echo 'on : <input type="text" name="COMPLETED['. $row["LIST_NUM"] .']" value='.$row["COMPLETED"].'><br/>'."\n";
		echo '<input type="hidden" name="LIST_NUM[]" value="'. $row["LIST_NUM"] .'">'."\n";
		echo '<input type="checkbox" name="delete[]" value="'. $row["LIST_NUM"] .'">'."\n";
		echo "<hr>\n";
		
		
	}
	echo '<input type="submit" name="submit" value="make it so">';
	echo '</form>';
	
	}
	
?>


</body>
</html>