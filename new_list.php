<html>
<head>
<title>Start my list</title>

  <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("select#type").attr("disabled","disabled");
            $("select#category").change(function(){
            $("select#type").attr("disabled","disabled");
            $("select#type").html("<option>wait...</option>");
            var id = $("select#category option:selected").attr('value');
            $.post("select_type.php", {id:id}, function(data){
                $("select#type").removeAttr("disabled");
                $("select#type").html(data);
            });
        });
        $("form#select_form").submit(function(){
            var cat = $("select#category option:selected").attr('value');
            var type = $("select#type option:selected").attr('value');
            if(cat>0 && type>0)
            {
                var result = $("select#type option:selected").html();
                $("#result").html('your choice: '+result);
            }
            else
            {
                $("#result").html("you must choose two options!");
            }
            return false;
        });
    });
    </script>
    
    
    <link rel="stylesheet" href="style.css" type="text/css" media="screen" />

	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>

	<script type="text/javascript" src="js/jquery.cookie.js"></script>

	<script type="text/javascript" src="js/control.js"></script>
	
   

</head>


<body>

  <?php include "select.class.php"; ?>
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
 
$name= $_POST['name'];
$senha= $_POST['senha'];
$email= $_POST['email'];


}


$sql = "INSERT INTO UCKET.USERS".
       "(NAME, 
		SENHA,
		EMAIL,
	)".

       "VALUES ('$name',
	    '$senha',
	    '$email')";
				   
	   
mysql_select_db('UCKET');
$retval = mysql_query ($sql, $conn);
if(! $retval )
{
  die('Sorry, but we really could not enter $name or $senha or $email as data ' . mysql_error());
}
echo "Entered $name and $senha and $email as data successfully\n";
mysql_close($conn);
}
else
{
?>

<div id="wrap">

		<div id="header">
<form method="post" action="<?php $_PHP_SELF ?>">
        
        
	<fieldset>

			<p>Set up my account</p>
		

			<ol class="formset">

				<li><label for="name">User name: </label>
               		 <input name="name" type="text" id="name" value=""> 
                </li>
                <li><label for="senha">Password: </label>
               		 <input name="senha" type="text" id="senha" value=""> 
                </li>

				<li><label for="email">Email: </label>
					 <input name="email" type="text" id="email" value=""> 
              </li>
         
           </ol>

      
 
            <input name="add" type="submit" id="add" value="Let's do this" class="submitbtn">

		</fieldset>
        </form>

	</div>

<?php
}
?>
<hr>



 <?php include("includes/ucketfoot.txt"); ?>
 
