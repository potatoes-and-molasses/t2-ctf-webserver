<?php

$inc="home.php";
if (isset($_GET["inc"])) {
    $inc=$_GET['inc'];
    if (file_exists($inc)){
	$f=basename(realpath($inc));
	if ($f == "index.php"){
	    $inc="home.php";
	}
    }
}

include("config.php");


echo '
  <html>
  <body background="bitcoin.jpg">
  <link rel="stylesheet" property="stylesheet" id="s" type="text/css" href="c.css" media="all" />
    <h1>HackFile !!</h1>
    <ul>
	<li><a href="?inc=home.php">home</a></li>
	<li><a href="?inc=login.php">login</a></li>
    </ul>
';
include($inc);

echo '
  </body>
  </html>
';


?>