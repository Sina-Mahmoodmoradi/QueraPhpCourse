<?php
session_start();
if(empty($_POST['email']))die('No email!');
if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))die("Invalid email!");
if(empty($_POST['csrf_token']))die('Invalid token!');
if(!hash_equals($_POST['csrf_token'],$_SESSION['csrf_token']))die('Invalid token!');
echo 'Email changed successfully!';