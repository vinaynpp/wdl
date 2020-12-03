<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "ecom");
define('SERVER_PATH', $_SERVER['DOCUMENT_ROOT'] . '/ecom1/');
define('SITE_PATH', 'http://localhost/ecom1/');

define('PRODUCT_IMAGE_SITE_PATH', SITE_PATH . 'photu/');
define('PRODUCT_IMAGE_SERVER_PATH', SERVER_PATH . 'photu/');
?>
