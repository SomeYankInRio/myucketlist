<html>
<head>
<title>Enter new Item</title>

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
$NAME= $_POST['name'];
$CATEGORY= $_POST['category'];
$CAT= $_GET['cat'];
}

$sql = "INSERT INTO ITEM".
       "(NAME,	
		CATEGORY,
		QUANTITY)".
       "VALUES ('$NAME',    
		'$CATEGORY',
		'$CAT')";
				   	   
mysql_select_db('UCKET');
$retval = mysql_query ($sql, $conn);
if(! $retval )
{
  die('Sorry, but we cannot enter $NAME or $CATEGORY as data ' . mysql_error());
}
echo "Entered $NAME, $CATEGORY and $CAT successfully. Want to add another one?\n";
mysql_close($conn);

     }
else
{
?>

<form method="post" action="<?php $_PHP_SELF ?>">          
	<fieldset>

			<p>Add a new item</p>
		
			<ul class="formset">

				<li><label for="name">Name: </label>
               		 <input name="name" type="text" id="name" value=""> 
                </li>  

				<li><label for="category">Category: </label>
					 <input name="category" type="text" id="CATEGORY" value=""> 
              </li>
              <li><label for="cat"></label>
					 <input name="cat" type="hidden" id="CAT" value="$CAT"> 
              </li>
         
           </ul>
    
            <input name="add" type="submit" id="add" value="Add it" class="submitbtn">

		</fieldset>
        </form>
<?php
}
?>
<hr>
 <?php include("includes/ucketfoot.txt"); ?>
