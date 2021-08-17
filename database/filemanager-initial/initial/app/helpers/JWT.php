<?php

class JWT
{
    public static function encode($payload)
    {
        $header = [
            "typ" => "JWT",
            "alg" => "HS256"
        ];
        $secret = "$0Me_SEcREt";
        $header = json_encode($header);
        $header = self::base64UrlEncode($header);
        $payload = json_encode($payload);
        $payload = self::base64UrlEncode($payload);
        $signature = hash_hmac("sha256", "$header.$payload", $secret, true);
        $signature = self::base64UrlEncode($signature);

        return "$header.$payload.$signature";
    }

    public static function decode($token)
    {
        list($header, $payload, $signature) = explode(".", $token);
        $secret = "$0Me_SEcREt";
        if (
            !hash_equals(
                self::base64UrlDecode($signature),
                hash_hmac("sha256", "$header.$payload", $secret, true)
            )
        ) {
            return false;
        }
        $payload = self::base64UrlDecode($payload);
        $payload = json_decode($payload, true);

        return $payload;
    }

    private static function base64UrlEncode($input)
    {
        return str_replace(
            ["+", "/", "="],
            ["-", "_", ""],
            base64_encode($input)
        );
    }
    
    private static function base64UrlDecode($input)
    {
        $remainder = strlen($input) % 4;
        if ($remainder) {
            $padlen = 4 - $remainder;
            $input .= str_repeat("=", $padlen);
        }
    
        return base64_decode(
            str_replace(
                ["-", "_"],
                ["+", "/"],
                $input
            )
        );
    }
}
