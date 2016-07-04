<?php
// Start the session
session_start();
?>
<html>
<head>
<title>Start Here</title>
 <link rel="stylesheet" href="css/ucket.css" type="text/css" />
 <!-- <link rel="stylesheet" href="css/style.css" type="text/css" /> -->
 
   <?php include("includes/catslides.txt"); 
	?>
</head>
<body>

<div id="container">

    <div id="header">
    
    	<h1>Ready to *UCKET?</h1>
    </div>
   <!-- <div id="content">
    <?php //include("includes/nav.txt"); ?>
    <div id="main">
    -->
             
            <?php

$servername = "localhost";
$username = "ucket";
$password = "buck3tl1st";
$dbname = "UCKET";
$NUM=$_POST['num'];
$NAME=$_GET['name'];
$CAT=$_GET['cat'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

if(isset($_POST['add']))
{
	
	

$_SESSION["CAT"] = "";
$_SESSION["CAT_NAME"] = "";
$_SESSION["CAT_NUM"] = "";
$_SESSION["USER_NUM"] = "";
$_SESSION["NUM"] = "";
$_SESSION["USER_NAME"] = "";	
		 
	
	?> <div id="content">
    <?php include("includes/nav.txt"); ?>
    <div id="main">
    <?php
		
//$servername = "localhost";
//$username = "ucket";
//$password = "buck3tl1st";
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
$EMAIL= $_POST['email'];
$SENHA= $_POST['senha'];
$_SESSION['NAME'] = $NAME;
$_SESSION['NUM_LOGIN'] = 0;
}


$sql = "INSERT INTO USERS".
       "(NAME,
		SENHA,
		EMAIL,
		NUM_LOGIN)".

       "VALUES ('$NAME',
	    '$SENHA',
		'$EMAIL',
		'0')";
				   
	   
mysql_select_db('UCKET');
$retval = mysql_query ($sql, $conn);
if(! $retval )
{
  die('Sorry, but we cannot enter $NAME or $SENHA or $EMAIL as data ' . mysql_error());
}


//<!-- good so far -->




echo "Congratulations $NAME, you went into the database. <hr><p>In about 3 minutes you'll receive an email with more information but we can give you a little hint. <p>You'll click on a link and it will bring you back here all validated and activated and ready to create your very own *UCKET list. \n
If you were reading real slowly the email might already have arrived. Wanna check? If it's not there yet it could mean that our mail server isn't working too well or that you didn't type in your email address properly. Rather than try to register again pat yourself on the back for having gotten this far, remind yourself that you really do know how to type your own email address and go do something else for a few minutes. If it still hasn't arrived <a href=/index.html>try again</a> or <a href='mailto:cornelius.conboy@gmail.com?Subject=ucket%20registration%20failed' target='_top'>let us know</a>";


mysql_close($conn);




         $to = "$EMAIL"; 
         $message = "<a href='www.myucketlist.com/enter.php?name=$NAME'>CLICK HERE TO ACTIVATE YOUR ACCOUNT</a>";
         $message .= "<h1>$NAME</h1>";
		 $message .= "If your technology does not let you click on the link above copy and paste this into your browser, then ask someone to fix your email to enable clickable links. 
<br>
'www.myucketlist.com/enter.php?name=$NAME'
<br><ul><li>
Once you login the fun really starts. You’ll be able to create your personal *UCKET list and investigate what other people have on theirs, maybe get some good ideas. </li><li>

Based on what you've already done (and when) we'll use super duper technology to find out when you'll be ready to kick it and then *UCKET will create a special portrait of you. You can call him Dorian Grey if you want</li><li>

We'll bother you when you should be completing an item, unless you tell us<a href='www.ipanemaplus.com.br/krill/unsubscribe.php?name=$NAME'> not to</a></li><li>


Since you're not an incredibly dull personsn the things you want to do will change over time so you can modify your list along the way. There's nothing wrong with being incredibly dull, you can freeze your list whenever you want</li><li>
Watch a whole bunch of little animations we haven't created yet for the most popular items. We're loving on Edward Gorey/Lemony Snickett/Terry Gilliam style but itall depends on who finds us that wants to *UCKET as much as we do. </li><li>
Get meaningless yet valuable rewards when you tell us you've done one of the things on your list</li><li>
Watch as we change your kicking date - there will be music</li><li>
Do it all on your phone or tablet because, really, who uses a compter anymore except at work? Of course we don't mind if you *UCKET at work- who doesn't? </li><li>
It'll all look very stylish and even though there’s lots of text that actually  explains things pretty well you won't read this far anyway so why do we bother writing it? Certainly not for the money, this is a don't quit your day job project. OK, maybe it's just to be working on something that's interesting and fun and let's you think there might be a spark of excitement in your otherwise drab life force draining existance. Oh *UCKET all.
</li>
</ul>";

         $subject = "Are you ready to *UCKET, $NAME?";
         $header = "From:cornelius.conboy@gmail.com \r\n";
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
		 $header .= "Bcc: cornelius.conboy@gmail.com \r\n";
         
         $retval = mail ($to,$subject,$message,$header);
		 
		 
$_SESSION["NAME"] = "";
$_SESSION["CAT"] = "";
$_SESSION["CAT_NAME"] = "";
$_SESSION["CAT_NUM"] = "";
$_SESSION["USER_NUM"] = "";
$_SESSION["NUM"] = "";
$_SESSION["USER_NAME"] = "";	
		 
		 
		 
         
         if( $retval == true ) {
            echo "Go take a look...";
         }else {
            echo "Problem sending the email...";
         }
     
}
else
{
?>
<div id="content">
    <?php include("includes/nav.txt"); ?>
    <div id="main">
   


		
<form method="post" action="<?php $_PHP_SELF ?>">
        
        
	<fieldset>

			<p>Set up my account</p>
		

			<ul>

				<li><label for="name">User name: </label>
               		 <input name="name" type="text" id="name" value=""> 
                </li>
                <li><label for="senha">Password: </label>
               		 <input name="senha" type="password" id="senha" value=""> 
                </li>

				<li><label for="email">Email: </label>
					 <input name="email" type="text" id="email" value=""> 
              </li>
         
           </ul>

      
 
            <input name="add" type="submit" id="add" value="Let's do this" class="submitbtn">

		</fieldset>
        </form>


	</div>
     <div id="footer">
     <?php include("includes/ucketfoot.txt"); ?>
    </div>

<?php
}
?>

