<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php
// to change a session variable, just overwrite it

$_SESSION["NAME"] = "";
$_SESSION["CAT"] = "";
$_SESSION["CAT_NAME"] = "";
$_SESSION["CAT_NUM"] = "";
$_SESSION["USER_NUM"] = "";
$_SESSION["NUM"] = "";
$_SESSION["USER_NAME"] = "";
$_SESSION["NUM_LOGIN"] = "";
//print_r($_SESSION);
echo "NAME is now set to " . $_SESSION["NAME"] . ". ";
echo "<br>CAT is now set to " . $_SESSION["CAT"] . ". ";
echo "<br>CAT NAME is now set to " . $_SESSION["CAT_NAME"] . ". ";
echo "<br>NUM is now set to " . $_SESSION["NUM"] . ". ";
?>
<hr>


<a href="enter.php"> re-enter </a>
</body>
</html> 

