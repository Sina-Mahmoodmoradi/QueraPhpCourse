<?php

if ($_SERVER['REQUEST_URI'] != '/exchange/api/v1.0/exchange/pairs') {
    die;
}

header('Content-Type: application/json');

echo file_get_contents(__DIR__.'/response.json');
