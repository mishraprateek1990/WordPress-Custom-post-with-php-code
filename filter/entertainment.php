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
            <option value="0">All</option>
            <option value="1">Sports</option>
            <option value="2" selected>Entertainment</option>
            <option value="3">Healthcare</option>
        </select>
    </form>
    
    <div class="blog-posts">
        <div class="post">
            <h2>Entertainment</h2>
            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
            <p>Category: entertainment</p>
        </div>
    </div>
</body>
</html>
