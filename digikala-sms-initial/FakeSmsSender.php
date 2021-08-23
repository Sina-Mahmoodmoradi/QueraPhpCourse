<?php

class FakeSmsSender implements SmsSenderInterface
{
    public function sendMessages(array $numbers, array $bodies)
    {
        // TODO: Implement sendMessages method here
    }

    public function getMessagesLimit(): int
    {
        // TODO: Implement getMessagesLimit method here
    }

    public function getProviderName(): string
    {
        // TODO: Implement getProviderName method here
    }
}