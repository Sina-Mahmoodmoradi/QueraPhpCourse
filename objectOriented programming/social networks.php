<?php


class SocialMedia
{
    private $google_plus;
    private $telegram;
    private $twitter;

    public function __construct($google_plus, $telegram, $twitter)
    {
        $this->google_plus=$google_plus;
        $this->telegram=$telegram;
        $this->twitter=$twitter;
    }

    public function share($text)
    {
        $this->google_plus->share_text($text);
        $this->telegram->sendMessage($text);
        $this->twitter->share($text);
    }
}