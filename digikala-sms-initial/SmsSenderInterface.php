<?php

interface SmsSenderInterface
{
    /**
     * @param array $numbers
     * @param array $messages
     * @throws SmsSendException
     */
    public function sendMessages(array $numbers, array $messages);

    /**
     * @return int maximum number of messages that can be send in one request
     */
    public function getMessagesLimit(): int;

    public function getProviderName(): string;

}
