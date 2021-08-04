<?php

function redirect($uri) {
    header('Location: ' . preg_replace('/\/+/', '/', Base::getInstance()->get('BASE') . $uri));
}
