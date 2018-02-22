<?php
include("website/config.php");

if ( isset($_POST["username"]) && isset($_POST["password"]) ){
    if ($_POST["username"]==$username && $_POST["password"]==$password){
	/* THIS IS NOT A PART OF THE GAME ---> */$team = $_SERVER['TEAM_NAME'];if($team==FALSE){$team="team_test";}$url = "http://ec2-35-176-150-168.eu-west-2.compute.amazonaws.com:3000/ctf/finished";$data = array("team"=>$team , "stage"=>"bypassedLogin");$options = array('http' => array('header'  => "api-key: HakunaMatata69\r\n",'method'  => 'POST','content' => http_build_query($data)));$context  = stream_context_create($options);$result = file_get_contents($url, false, $context); /* <--------- */
	
      print("<h2>Welcome back Master !</h2>");
      print("<br>FTP is running<br/>");
	   print("<br>SSH is running<br/>");
    } else {
      print("<h3>Error : no such user/password</h3><br />");
    }
} else {
?>

<form action="" method="post">
  Login&nbsp;<br/>
  <input type="text" name="username" /><br/><br/>
  Password&nbsp;<br/>
  <input type="password" name="password" /><br/><br/>
  <br/><br/>
  <input type="submit" value="connect" /><br/><br/>
</form>

<?php } ?>