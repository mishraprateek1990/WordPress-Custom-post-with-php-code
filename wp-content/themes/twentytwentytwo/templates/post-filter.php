<?php
/**
 * Template Name: Custom Post
 * Template Post Type: post
 */

// Include header

$ttl = '';
if(isset($_POST['type'])) {
    switch($_POST['type']) {
        case 1:
            header("Location: sports");
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
        <div class="post">
            <h2><?= $ttl ?></h2>
            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
            
        </div>
    </div>
</body>
</html>
<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <?php
        // Start the loop.
        while (have_posts()) : the_post();

            // Include the single post content template.
            get_template_part('template-parts/content', 'single');

            // If comments are open or we have at least one comment, load up the comment template.
            if (comments_open() || get_comments_number()) :
                comments_template();
            endif;

        // End of the loop.
        endwhile;
        ?>
    </main><!-- .site-main -->
</div><!-- .content-area -->

<?php
// Include sidebar
get_sidebar();

// Include footer
get_footer();
?>
