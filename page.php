<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

<div id="primary" class="container-fluid">
	<main id="main" class="site-main" role="main">

		<?php
		// Start the loop.
		while ( have_posts() ) :
			the_post();

			// Include the page content template.
			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}

			// End of the loop.
		endwhile;
		?>

<!--        Выводит список дочерних страниц-->
        <?php
        $stati_children = new WP_Query(array(
                'post_type' => 'page',
                'post_parent' => get_the_ID()
            )
        );
        if($stati_children->have_posts()) :
            while($stati_children->have_posts()): $stati_children->the_post();
                echo '<p><a href="'.get_the_permalink().'">'.'<h5>'.get_the_title().'</h5>'.'</a></p>';
            endwhile;
        endif; wp_reset_query();
        ?>

	</main><!-- .site-main -->
</div>


<?php get_footer(); ?>
