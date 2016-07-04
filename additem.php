<?php
// Start the session
session_start();
?>

<html>

<head>

<title>I want this</title>

 <link rel="stylesheet" href="css/ucket.css" type="text/css" />
 
</head>

<body>




<?php
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
$NAME= $_POST['NAME'];
$CAT= $_POST['CAT'];
$NUM_USER=$_SESSION['USER_NUM'];
$CAT_NUM= $_SESSION['CAT_NUM'];
$CAT_NAME= $_SESSION['CAT_NAME'];
$_CAT_NAME = mysql_real_escape_string($CAT_NAME);
$_NAME = mysql_real_escape_string($NAME);
}

$sql1 = "INSERT INTO ITEM".
       "(NAME,
	   	QUANTITY,	
		CATEGORY_NAME,
		CATEGORY)".
       "VALUES ('$_NAME', 
	   '1',   
		'$_CAT_NAME',
		" . $_SESSION["CAT"] . ")";
		
		
$sql2 = "INSERT INTO LIST".
       "(NUM_USER,
	   	ITEM_NAME,	
		CATEGORY_NAME)".
       "VALUES (' " . $_SESSION["NUM"] . "', '$_NAME',    
		'$_CAT_NAME')";
				   	   
				   	   
mysql_select_db('UCKET');


		
		$retval2 = mysql_query ($sql2, $conn);
		$retval = mysql_query ($sql1, $conn);
		
		//put in email notification here
		
if(! $retval )
{
  die('Sorry, but we cannot enter $_NAME or $_CAT_NAME ' . mysql_error());
}
echo "" . $_SESSION["USER_NAME"] . ", who is user number  " . $_SESSION["NUM"] . " just created a new item for the ucket list db. <p>
 It's called: $NAME andand it went into the category  " . $_SESSION["CAT_NAME"] . " successfully. Want to add another one?\n

";
   echo '<script>window.location="seeitems.php"</script>';


mysql_close($conn);


 		 $to = "cornelius.conboy@gmail.com"; 
      	 $message .= "<h2>" . $_SESSION["USER_NAME"] . ",</h2> 
		 who is user number  " . $_SESSION["NUM"] . " just added  <p> 
		 <h2> $NAME </h2> <p> to category
		 <h2> " . $_SESSION["CAT_NAME"] . "</h2>";

         $subject = "$NAME is now an ucket list item";
         $header = "From:cornelius.conboy@gmail.com \r\n";
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
		 $header .= "Bcc: cornelius.conboy@gmail.com \r\n";
         
         $retval = mail ($to,$subject,$message,$header);

   }
else
{
?>

<form method="post" action="<?php $_PHP_SELF ?>">          
	<fieldset>
		
		<?php echo "Cat name: " . $_SESSION["CAT_NAME"] . ""; ?>
			<ul class="formset">

				
                     <textarea rows="4" cols="50" name="NAME" id="NAME" placeholder="What do you want to add to the <?php echo " " . $_SESSION["CAT_NAME"] . ""; ?> category?">
</textarea>
                    
					 <input name="CAT" type="hidden" id="CAT" value="$CAT"> 
           
    <br>
            <input name="add" type="submit" id="add" value="I want this" class="submitbtn">

		</fieldset>
        </form>
<?php
}
?></body>
</html>


