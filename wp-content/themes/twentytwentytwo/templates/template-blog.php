<?php
/*
 * Template Name: Blog Template
 */
// get_header();
?>

<h1>Dynamic Blog Page</h1>

<form>
    <label for="category">Filter by Category:</label>
    <select name="category" id="category">
        <option value="">All</option>
        <?php
            $categories = get_categories();
            foreach ($categories as $category) {
                echo '<option value="' . $category->slug . '">' . $category->name . '</option>';
            }
        ?>
    </select>
</form>

<div id="blog-posts"></div>

<?php get_footer(); ?>

<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script>
jQuery(document).ready(function($) {
    $('#category').change(function() {
        var category = $(this).val();
        var url = '<?php echo esc_url(home_url('/blog-2/')); ?>';
        if (category) {
            url += '?category=' + encodeURIComponent(category);
        }
        window.history.pushState('', '', url);
        loadPosts(category);
    });

    function loadPosts(category) {
        $.ajax({
            url: '<?php echo admin_url('admin-ajax.php'); ?>',
            type: 'POST',
            data: {
                action: 'load_blog_posts',
                category: category
            },
            success: function(response) {
                $('#blog-posts').html(response);
            }
        });
    }
});
</script>
