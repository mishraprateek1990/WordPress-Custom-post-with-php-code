<?php
/*
 * Template Name: Archive Template for Custom Taxonomy
 */

get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">

        <?php
        // Start the loop
        if (have_posts()) :
            while (have_posts()) :
                the_post();
        ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">
                        <h1 class="entry-title"><?php the_title(); ?></h1>
                    </header><!-- .entry-header -->

                    <div class="entry-content">
                        <?php the_content(); ?>
                    </div><!-- .entry-content -->
                </article><!-- #post-<?php the_ID(); ?> -->

        <?php
            endwhile;
        else :
            // If no posts are found
            echo '<p>No posts found</p>';
        endif;
        ?>

        <?php
        // Fetch posts according to the taxonomy
        $taxonomy = 'your_taxonomy'; // Replace 'your_taxonomy' with your actual taxonomy name
        $terms = get_terms($taxonomy);
        if ($terms) :
            foreach ($terms as $term) :
                $args = array(
                    'post_type' => 'your_post_type', // Replace 'your_post_type' with your actual post type name
                    'tax_query' => array(
                        array(
                            'taxonomy' => $taxonomy,
                            'field'    => 'slug',
                            'terms'    => $term->slug,
                        ),
                    ),
                );
                $query = new WP_Query($args);
                if ($query->have_posts()) :
                    echo '<h2>' . $term->name . '</h2>';
                    while ($query->have_posts()) :
                        $query->the_post();
        ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <header class="entry-header">
                                <h3 class="entry-title"><?php the_title(); ?></h3>
                            </header><!-- .entry-header -->
                            <div class="entry-content">
                                <?php the_excerpt(); ?>
                            </div><!-- .entry-content -->
                        </article><!-- #post-<?php the_ID(); ?> -->
        <?php
                    endwhile;
                    wp_reset_postdata(); // Reset post data
                endif;
            endforeach;
        endif;
        ?>
    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
