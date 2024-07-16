
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];

    // Validate and create category
    if (!empty($name)) {
        $success = $categoryController->createCategory($name);
        if ($success) {
            echo '<script>alert("Category created successfully");</script>';
        } else {
            echo '<script>alert("Failed to create category");</script>';
        }
    } else {
        echo '<script>alert("Category name is required");</script>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Category</title>
    <link rel="stylesheet" href="views/styles.css">
</head>
<body>
    <div class="container">
        <h1>Create Category</h1>
        <form action="create_category.php" method="post">
            <label for="name">Category Name:</label><br>
            <input type="text" id="name" name="name" required><br><br>
            <button type="submit">Create Category</button>
        </form>
    </div>
</body>
</html>
