<?php
$fname = "refunds.live";
$basedec = "dec._x_";
$template = "SuperKAWAISuperKAWAI";
$f = fopen($fname, "r") or die("nope");
$refunds = json_decode(fread($f, filesize($fname)),true);
$queried = $_GET["q"] or die("\nbye:(");

if(isset($refunds[$queried])){
    $f = fopen($basedec, "r") or die("\nbye:(");
    $unfoodify_breadsticks = fread($f, filesize($basedec));
    print str_replace($template, base64_decode($refunds[$queried]), $unfoodify_breadsticks);
}
else{
    print "not cool";
}


?>