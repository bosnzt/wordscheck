<?php

require __DIR__.'/vendor/autoload.php';

//base php7.4

$content = "他在传播艳情内容";
$url = "localhost:50051";

$client = new \Rpcsvc\GreeterClient($url,[
    'credentials'   => Grpc\ChannelCredentials::createInsecure()
]);

$request  = new Rpcsvc\CheckReq();
$request->setContent($content);

//调用远程服务
list($reply, $status) = $client->check($request)->wait();

if ($status->code !== Grpc\STATUS_OK) {
    echo "ERROR: " . $status->code . ", " . $status->details . PHP_EOL;
    exit(1);
}

echo $reply->getCode() . PHP_EOL;
echo $reply->getMsg() . PHP_EOL;
echo $reply->getReturnStr() . PHP_EOL;
foreach ($reply->getWordList() as $obj) {
    // print_r($obj);
    echo $obj->getCategory() .PHP_EOL;
    echo $obj->getKeyword() .PHP_EOL;
    echo $obj->getPosition() .PHP_EOL;
    echo $obj->getLevel() .PHP_EOL;
}

