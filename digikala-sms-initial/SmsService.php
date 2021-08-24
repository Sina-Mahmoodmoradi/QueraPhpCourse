<?php

class SmsService
{
    private $sender;

    public function __construct(SmsSenderInterface $sender)
    {
        $this->sender = $sender;
    }

    public function sendOne(string $number, string $body)
    {
        $this->sender->sendMessages([$number],[$body]);
    }

    public function sendMany(array $numbers, array $bodies)
    {
        $limit = $this->sender->getMessagesLimit();
        $numberArrays = array_chunk($numbers, $limit);
        $bodyArrays = array_chunk($bodies, $limit);
        foreach($numberArrays as $index => $arr){
            $this->sender->sendMessages($arr,$bodyArrays[$index]);
        }
    }
}
