<?php

//base php7.4

function http_post_json($url, $jsonStr)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonStr);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json; charset=utf-8',
            'Content-Length: ' . strlen($jsonStr)
        )
    );
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
 
    return array($httpCode, $response);
}
 
$content = "他在传播艳情内容";
$url = "http://localhost:8080/wordscheck";
$jsonStr = json_encode(array('content' => $content));
list($returnCode, $returnContent) = http_post_json($url, $jsonStr);
echo $returnCode . PHP_EOL;
echo $returnContent . PHP_EOL;