<?php

class SmsService
{
    private $sender;

    public function __construct(SmsSenderInterface $sender)
    {
        // TODO: Implement __construct method here
    }

    public function sendOne(string $number, string $body)
    {
        // TODO: Implement sendOne method here
    }

    public function sendMany(array $numbers, array $bodies)
    {
        // TODO: Implement sendMany method here
    }
}
