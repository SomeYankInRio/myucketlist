 <?php
$servername = "localhost";
$username = "ucket";
$password = "buck3tl1st";
$dbname = "UCKET";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}





if( $_POST )
{
  $con = mysql_connect("localhost","inmoti6_myuser","mypassword");

  if (!$con)
  {
    die('Could not connect: ' . mysql_error());
  }

  mysql_select_db("inmoti6_mysite", $con);

  $name = $_POST['name'];
  $senha = $_POST['senha'];
  $email = $_POST['email'];
  

  $query = "
  
  
  INSERT INTO `UCKET`.`USERS` ( `NAME`, `SENHA`, `EMAIL`) VALUES ('nameypoo', 'passyword', 'email@address.com');";

  mysql_query($query);

  echo "<h2>Thanks, it went in.</h2>";

  mysql_close($con);
}
?>
