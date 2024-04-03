<?php
/*
Template Name: Filter Blog2
*/

$pdo = new PDO('mysql:host=localhost;dbname=blog_db', 'root', '');

$categories = $pdo->query("SELECT DISTINCT name FROM wp_terms")->fetchAll(PDO::FETCH_COLUMN);

$category = isset($_GET['name']) ? $_GET['name'] : '';
$query = "SELECT * FROM wp_terms";
if (!empty($category)) {
    $query .= " WHERE name = :category";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':category', $category, PDO::PARAM_STR);
    $stmt->execute();
} else {
    $stmt = $pdo->query($query);
}
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Blog Page</title>
    <script>
        // JavaScript function to handle dropdown change event
        function filterPosts() {
            var category = document.getElementById('category').value;
            // Update the URL with the selected category
            window.location.href = '?category=' + encodeURIComponent(category);
        }
    </script>
</head>
<body>
    <h1>Dynamic Blog Page</h1>
    
    <form>
        <label for="category">Filter by Category:</label>
        <select name="category" id="category">
            <option value="">All</option>
            <?php foreach ($categories as $cat) : ?>
                <option value="<?= $cat ?>" <?= ($category == $cat) ? 'selected' : '' ?>><?= $cat ?></option>
            <?php endforeach; ?>
        </select>
    </form>

    <div class="blog-posts">
        <?php
        
        $category = isset($_GET['category']) ? $_GET['category'] : '';
        $query = "SELECT * FROM wp_terms";
        if (!empty($category)) {
            $query .= " WHERE name = :category";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':category', $category, PDO::PARAM_STR);
            $stmt->execute();
        } else {
            $stmt = $pdo->query($query);
        }
        $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Step 3: Display blog posts
        if (empty($posts)) {
            echo "<p>No posts found.</p>";
        } else {
            foreach ($posts as $post) {
                echo "<div class='post'>";
                echo "<h2>{$post['title']}</h2>";
                echo "<p>{$post['content']}</p>";
                echo "<p>Category: {$post['category']}</p>";
                echo "<p>Date: {$post['date']}</p>";
                echo "</div>";
            }
        }
        ?>
    </div>
</body>
</html>
