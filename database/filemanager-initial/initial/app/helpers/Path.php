<?php

class Path
{
    public static function fixRequestURI()
    {
        $base_uri = self::getBaseURI();
        if ($base_uri == '/') {
            $base_uri = '';
        }
        $uri = Path::getRequestURI();
        $_SERVER['REQUEST_URI'] = $uri['path']
            . (isset($uri['query']) ? '?' . $uri['query'] : '')
            . (isset($uri['fragment']) ? '#' . $uri['fragment'] : '');
        $_SERVER['REQUEST_URI'] = preg_replace(
            '/^' . preg_quote($base_uri, '/') . '/',
            '',
            $uri['path']
        );
    }

    public static function getBaseURI()
    {
        $base_uri = rtrim(Path::fixslashes(dirname($_SERVER['SCRIPT_NAME'])), '/');
        if (empty($base_uri)) {
            $base_uri = '/';
        }
        return $base_uri;
    }

    public static function getRequestURI()
    {
        return parse_url(
            (preg_match('/^\w+:\/\//',$_SERVER['REQUEST_URI']) ? ''
                : Path::getScheme() . '://' . $_SERVER['SERVER_NAME'])
            . $_SERVER['REQUEST_URI']);
    }

    public static function getScheme()
    {
        return isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on'
            || isset($headers['X-Forwarded-Proto'])
            && $headers['X-Forwarded-Proto'] == 'https' ? 'https' : 'http';
    }

    public static function fixSlashes($str)
    {
        return $str ? strtr($str, '\\', '/') : $str;
    }
}
