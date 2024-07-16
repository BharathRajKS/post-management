<?php
session_start();

require_once 'db_config.php';
require_once 'controllers/PostController.php';
require_once 'controllers/CategoryController.php';
require_once 'controllers/AuthController.php';

$postController = new PostController($db);
$categoryController = new CategoryController($db);
$authController = new AuthController($db);


if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

$posts = $postController->getAllPosts();


include 'views/index.php';
?>
