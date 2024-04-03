<?php

if(isset($_POST['type'])) {
    switch($_POST['type']) {
        case 0:
            header("Location: index.php");
            break;
        case 1:
            header("Location: sports.php");
            break;
        case 2:
            header("Location: entertainment.php");
            break;
        case 3:
            header("Location: healthcare.php");
            break;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
</head>
<body>
    <h1>Blog Page</h1>

    <form method="post" enctype="multipart/form-data">
        <label for="category">Filter by Category:</label>
        <select name="type" id="type" onchange="this.form.submit()">
            <option value="0" selected>All</option>
            <option value="1">Sports</option>
            <option value="2">Entertainment</option>
            <option value="3">Healthcare</option>
        </select>
    </form>
    
    <div class="blog-posts">
        <div class="post">
            <h2>Sports</h2>
            <p>It is a long established fact that a reader will be distracted by the readable content....</p>
            <p>Category: sports</p>
        </div>
    </div>

    <div class="blog-posts">
        <div class="post">
            <h2>Entertainment</h2>
            <p>It is a long established fact that a reader will be distracted by the readable content....</p>
            <p>Category: entertainment</p>
        </div>
    </div>

    <div class="blog-posts">
        <div class="post">
            <h2>Healthcare</h2>
            <p>It is a long established fact that a reader will be distracted by the readable content....</p>
            <p>Category: healthcare</p>
        </div>
    </div>
</body>
</html>
