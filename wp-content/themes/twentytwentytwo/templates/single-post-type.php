<?php

$field_value = get_field('field_name');
if ($field_value) {
    echo '<p>Custom Field: ' . $field_value . '</p>';
}

    // Start the loop
    while (have_posts()) : the_post();

        // Output the post title
        the_title('<h1>', '</h1>');

        // Output the post content
        the_content();

        // Output ACF fields using the_field function
        // Replace 'field_name' with the actual field name or field key
        echo '<p>Custom Field: ';
        the_field('title');
        the_field('description');
        the_field('start_date');
        the_field('end_date');
        the_field('thumbnail');
        echo '</p>';

        // You can add more fields using the same approach
        // the_field('another_field_name');

    endwhile; // End of the loop
?>
