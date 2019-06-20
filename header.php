<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div class="container">
    <header role="banner">
        <nav class="navbar navbar-expand-lg navbar-light bg-light banner">
            <a class="navbar-brand" href="<?= home_url(); ?>">
                <?= netexp_bsac_custome_logo(); ?>
                <?php
                $description = get_bloginfo('description', 'display');
                if ($description || is_customize_preview()) :
                ?>
            </a>
            <a class="navbar-brand" href="<?= home_url(); ?>"><h6
                        class="site-description"><?= stristr($description, '  ', true) . '</br>' . stristr($description, '  ', false); ?></h6>
            </a>
            <?php endif; ?>
            <div class="col-md-auto ml-auto"><?php get_search_form(); ?></div>
        </nav>

        <?php if (has_nav_menu('primary')) : ?>
        <nav id="site-navigation" class="main-navigation" role="menu"
             aria-label="<?php esc_attr_e('Primary Menu', 'netexp-bsac'); ?>">
            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'primary',
                    'depth' => 3,
                    'menu_class' => 'nav justify-content-center',
                    'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                    'fallback_cb' => 'bs4Navwalker::fallback',
                    'walker' => new bs4Navwalker(),
                )
            );
            ?>
            <?php endif; ?>

        </nav>
        <?php if (get_header_image()) : ?>
            <?php
            /**
             * @param string $custom_header_sizes sizes attribute
             * for Custom Header. Default '(max-width: 709px) 85vw,
             * (max-width: 909px) 81vw, (max-width: 1362px) 88vw, 1200px'.
             */
            $custom_header_sizes = apply_filters('twentysixteen_custom_header_sizes',
                '(max-width: 709px) 85vw, (max-width: 909px) 81vw, 1110px');
            ?>

            <div class="header-image">
                <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                    <img src="<?php header_image(); ?>"
                         srcset="<?php echo esc_attr(wp_get_attachment_image_srcset(get_custom_header()->attachment_id)); ?>"
                         sizes="<?php echo esc_attr($custom_header_sizes); ?>"
                         width="1110px"

                         height="<?php echo esc_attr(get_custom_header()->height); ?>"
                         alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>">
                </a>
            </div><!-- .header-image -->
        <?php endif; // End header image check. ?>
    </header>

    <div id="content" class="content row py-3">
