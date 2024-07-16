<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Post</title>
    <link rel="stylesheet" href="views/styles.css">
</head>
<body>
    <div class="container">
        <h1>Create Post</h1>
        <form action="create_post.php" method="post">
            <label for="title">Post Title:</label><br>
            <input type="text" id="title" name="title" required><br><br>
            <label for="content">Content:</label><br>
            <textarea id="content" name="content" rows="5" required></textarea><br><br>
            <label for="category">Category:</label><br>
            <select id="category" name="category" required>
                <option value="">Select Category</option>
                <?php foreach ($categories as $category): ?>
                    <option value="<?php echo $category->getId(); ?>"><?php echo $category->getName(); ?></option>
                <?php endforeach; ?>
            </select><br><br>
            <button type="submit">Create Post</button>
        </form>
    </div>
</body>
</html>

<?php
// Handle post creation form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $categoryId = $_POST['category'];

    // Validate and create post
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
?>
