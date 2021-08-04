<?php

require_once __DIR__ . '/autoload.php';
require_once __DIR__ . '/routes.php';

$db_config = [
	'HOST' => 'localhost',
	'USERNAME' => 'root',
	'PASSWORD' => '',
	'NAME' => 'library'
];
$pdo = new PDO(
	'mysql:host=' . $db_config['HOST'] . ';dbname=' . $db_config['NAME'],
	$db_config['USERNAME'],
	$db_config['PASSWORD']
);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
Base::getInstance()->set('DB', $pdo);

Base::getInstance()->mset([
    'GLOBAL_VARS' => ['TITLE', 'BASE'],
    'TITLE' => 'مدیریت کتاب‌خانه',
    'BASE' => Path::getBaseURI()
]);

Template::getInstance()->setPath(__DIR__ . '/views');
