<?php

session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once 'config/database.php';
require_once 'app/repositories/DocumentoRepository.php';
require_once 'app/services/DocumentoService.php';
require_once 'app/controllers/DocumentoController.php';

// LOGIN
$config = ['user' => 'admin', 'password' => '123456'];

if (isset($_POST['login'])) {
    if ($_POST['user'] === $config['user'] &&
        $_POST['password'] === $config['password']) {
        $_SESSION['user'] = $_POST['user'];
    }
}

if (isset($_GET['logout'])  && $_GET['logout'] == 1) {
    session_destroy();
    header("Location: index.php");
    exit;
}

if (!isset($_SESSION['user'])) {
    echo '<form method="POST">
        <input name="user">
        <input name="password" type="password">
        <button name="login">Login</button>
    </form>';
    exit;
}

// DEPENDENCIAS
$db = Database::connect();
$repo = new DocumentoRepository($db);
$service = new DocumentoService($repo);
$controller = new DocumentoController($service);

// ROUTES
if (isset($_POST['create'])) {
    $controller->store();
}

if (isset($_GET['edit'])) {
    $docEdit = $controller->edit();
}

if (isset($_POST['update'])) {
    $controller->update();
}

if (isset($_GET['delete'])) {
    $controller->delete();
}

// DATA
$docs = $controller->index();

// VIEW
require 'app/views/home.php';