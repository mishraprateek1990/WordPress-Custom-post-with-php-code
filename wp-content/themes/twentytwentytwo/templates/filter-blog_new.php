<?php
/*
Template Name: Filter Blog New
*/

$ttl = '';
if(isset($_POST['type'])) {
    switch($_POST['type']) {
        case 1:
            header("Location: sports.php");
            $ttl = "Sports"; 
            break;
        case 2:
            header("Location: entertainment");
            $ttl = "Entertainment";
            break;
        case 3:
            header("Location: healthcare");
            $ttl = "Healthcare";
            break;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Blog Page</title>
</head>
<body>
    <h1>Dynamic Blog Page</h1>

    <form method="post" enctype="multipart/form-data">
        <label for="category">Filter by Category:</label>
        <select name="type" id="type" onchange="this.form.submit()">
            <option value="">All</option>
            <option value="1">Sports</option>
            <option value="2">Entertainment</option>
            <option value="3">Healthcare</option>
        </select>
    </form>
    
    <div class="blog-posts">
        <p>No posts found.</p>
        <div class="post">
            <h2>title</h2>
            <p>text</p>
            <p>Category: sports</p>
        </div>
    </div>
</body>
</html>
