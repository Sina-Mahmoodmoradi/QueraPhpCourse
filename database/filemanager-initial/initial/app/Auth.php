<?php

class Auth
{
    public function user()
    {
        if (empty($_COOKIE['authorization'])) {
            return null;
        }
        $payload = JWT::decode($_COOKIE['authorization']);
        if ($payload === false || $payload['exp'] < time()) {
            return null;
        }
        return $payload['user'];
    }

    public function check()
    {
        return !empty($this->user());
    }
}
