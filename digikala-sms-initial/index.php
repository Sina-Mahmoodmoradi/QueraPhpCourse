<?php

require __DIR__ . "/autoload.php";

$sms_service = new SmsService(new FakeSmsSender());

$numbers = [
    "41678208",
    "09361111111"
];
$messages = [
    "Message 1",
    "Message 2"
];

$sms_service->sendMany($numbers, $messages);
