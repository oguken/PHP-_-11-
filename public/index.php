<?php
define('ROOT_PATH', str_replace('public', '', $_SERVER["DOCUMENT_ROOT"]));
require_once(ROOT_PATH.'Controllers/ContactController.php');
require_once(ROOT_PATH.'Controllers/TopController.php');
use Controllers\ContactController;
use Controllers\TopController;

// pathを取得
$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

if ($path === '/' || $path === '/index/') {
    $controller = new TopController();
    $controller->index();
}

if ($path === '/contact/index/') {
    $controller = new ContactController();
    $controller->index();
}

if ($path === '/contact/confirm/') {
    $controller = new ContactController();
    $controller->confirm();
}

if ($path === '/contact/complete/') {
    $controller = new ContactController();
    $controller->complete();
}

if ($path === '/contact/update/') {
    $controller = new ContactController();
    $controller->update();
}

if ($path === '/contact/update/confirm/') {
    $controller = new ContactController();
    $controller->updateConfirm();
}

if ($path === '/contact/update/one/') {
    $controller = new ContactController();
    $controller->updateOne();
}

if ($path === '/contact/delete/one/') {
    $controller = new ContactController();
    $controller->deleteOne();
}

// not foundページへの遷移