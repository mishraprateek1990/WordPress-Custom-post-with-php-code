<?php
/*
Template Name: Filter Blog
*/


$pdo = new PDO('mysql:host=localhost;dbname=blog_db', 'root', '');

$categories = $pdo->query("SELECT DISTINCT name FROM wp_terms")->fetchAll(PDO::FETCH_COLUMN);

$category = isset($_GET['name']) ? $_GET['name'] : '';
// $query = "SELECT * FROM wp_posts where post_type = 'post'";
// if (!empty($category)) {
//     $query .= " WHERE name = :category";
//     $stmt = $pdo->prepare($query);
//     $stmt->bindParam(':name', $category, PDO::PARAM_STR);
//     $stmt->execute();
// } else {
//     $stmt = $pdo->query($query);
// }
// $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
    <form action="data.php" method="post">
        <label for="category">Filter by Category:</label>
        <select name="category" id="category">
            <option value= "">All</option>
            <?php foreach ($categories as $cat) : ?>
                <option value="<?= $cat ?>" <?= ($category == $cat) ? 'selected' : '' ?>><?= $cat ?></option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Apply Filter</button>
    </form>
    
    <div class="blog-posts">
        <?php if (empty($posts)) : ?>
            <p>No posts found.</p>
        <?php else : ?>
            <?php foreach ($posts as $post) : ?>
                <div class="post">
                    <h2><?= $post['title'] ?></h2>
                    <p><?= $post['content'] ?></p>
                    <p>Category: <?= $post['category'] ?></p>
                    <p>Date: <?= $post['date'] ?></p>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</body>
</html>
