<?php

class FakeSmsSender implements SmsSenderInterface
{
    public function sendMessages(array $numbers, array $bodies)
    {
        if(count($numbers) > $this->getMessagesLimit()){
            throw new SmsSendException('failed to send message');
        }
        $pattern='/^09[0-9]{9}$/';
        foreach($numbers as $index => $number){
            if(preg_match($pattern,$number))
                echo $number.':'.$bodies[$index]."\n";
            else
                echo "Wrong number\n";
        }
    }

    public function getMessagesLimit(): int
    {
        return 10;
    }

    public function getProviderName(): string
    {
        return 'digi';
    }
}