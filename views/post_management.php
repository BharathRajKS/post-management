<?php
session_start();

require_once 'db_config.php';
require_once 'controller/PostController.php';
require_once 'controller/CategoryController.php';

// Check if user is logged in and is admin
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}

$postController = new PostController($db);
$categoryController = new CategoryController($db);

$categories = $categoryController->getAllCategories();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $categoryId = $_POST['category'];


    if (!empty($title) && !empty($content) && !empty($categoryId)) {
        $success = $postController->createPost($title, $content, $categoryId);
        if ($success) {
            echo '<script>alert("Post created successfully");</script>';
        } else {
            echo '<script>alert("Failed to create post");</script>';
        }
    } else {
        echo '<script>alert("All fields are required");</script>';
    }
}

include 'views/post_management.php';
?>
