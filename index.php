<?php get_header(); ?>

    <div id="primary" class="col-sm-8" content">
        <main id="main" class="site-main" role="main">
            <?php if (have_posts()): ?>
                <?php while (have_posts()): the_post(); ?>
                    <div class="col-lg-12 post">

                        <h5 class="intro-text text-center"><a
                                    href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>

                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium'); ?></a>

                        <?php the_excerpt(); ?>

                        <a href="<?php the_permalink(); ?>">Подробнее ...</a>
                        <span class="info-post"> <?php the_author_posts_link(); ?> | <?php the_time('j F Y') ?><br></span>

                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
                       <?php
            if (function_exists("fellowtuts_wpbs_pagination"))
            {
                fellowtuts_wpbs_pagination();
                //fellowtuts_wpbs_pagination($the_query->max_num_pages);
            }
            ?>
        </main><!-- .site-main -->
    </div>

    <div class="col-sm-4 ml-auto sticky">
        <?php get_sidebar(); ?>
    </div>
<?php get_footer(); ?>