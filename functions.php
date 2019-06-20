<?php
require_once get_stylesheet_directory(). '/inc/bs4Navwalker.php';

function netexp_bsac_setup(){
    load_theme_textdomain('netexp-bsac');
    add_theme_support('title-tag');
    add_theme_support('custom-logo', array(
        'height'=>'90',
        'width'=> '90',
        'flex-height'=>false,
    ));

    add_theme_support('post-thumbnails');
    set_post_thumbnail_size(730,446);
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption'
    ));
    add_theme_support('post-formats', array(
        'aside',
        'image',
        'video',
        'gallery'
    ));
    add_image_size('netexp-logo', 90, 90);

    register_nav_menus(
        array(
            'primary' => __( 'Primary Menu', 'netexp-bsac' ),
        )
    );
}

add_action('after_setup_theme', 'netexp_bsac_setup');

add_filter('excerpt_more', function($more){
    return '';
}, 15);

function netexp_bsac_scripts(){
    wp_enqueue_style('style-css',get_stylesheet_uri());
    wp_enqueue_style('bootstrap-css',get_stylesheet_directory_uri(). '/css/bootstrap.min.css');

    wp_enqueue_script('jquery');
    wp_enqueue_script('popper-js', get_stylesheet_directory_uri(). '/js/popper.min.js');
    wp_enqueue_script('bootstrap-js', get_stylesheet_directory_uri(). '/js/bootstrap.min.js');
    wp_enqueue_script('bootstrap-js', get_stylesheet_directory_uri(). '/js/bootstrap.bundle.min.js');

}
add_action('wp_enqueue_scripts', 'netexp_bsac_scripts');

function netexp_bsac_custome_logo(){
    $logo_img = '';
    if( $custom_logo_id = get_theme_mod('custom_logo') ){
        $logo_img = wp_get_attachment_image( $custom_logo_id, 'netexp-logo', false, array(
            'class'    => 'd-inline-block align-top',
            'itemprop' => 'logo',
            'alt' => get_bloginfo('description', 'display'),
        ) );
    }
    return $logo_img;
}

/**
 * WordPress Bootstrap Pagination
 */
function fellowtuts_wpbs_pagination($pages = '', $range = 2)
{
    $showitems = ($range * 2) + 1;
    global $paged;
    if(empty($paged)) $paged = 1;
    if($pages == '')
    {
        global $wp_query;
        $pages = $wp_query->max_num_pages;

        if(!$pages)
            $pages = 1;
    }

    if(1 != $pages)
    {
        echo '<nav aria-label="Page navigation" role="navigation">';
        echo '<span class="sr-only">Page navigation</span>';
        echo '<ul class="pagination justify-content-center ft-wpbs">';

        echo '<li class="page-item disabled hidden-md-down d-none d-lg-block"><span class="page-link">' .__('Страница ') . $paged. __(' из '). $pages.'</span></li>';

        if($paged > 2 && $paged > $range+1 && $showitems < $pages)
            echo '<li class="page-item"><a class="page-link" href="'.get_pagenum_link(1).'" aria-label="First Page">&laquo;<span class="hidden-sm-down d-none d-md-block"> First</span></a></li>';

        if($paged > 1 && $showitems < $pages)
            echo '<li class="page-item"><a class="page-link" href="'.get_pagenum_link($paged - 1).'" aria-label="Previous Page">&lsaquo;<span class="hidden-sm-down d-none d-md-block"> Previous</span></a></li>';

        for ($i=1; $i <= $pages; $i++)
        {
            if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
                echo ($paged == $i)? '<li class="page-item active"><span class="page-link"><span class="sr-only">Current Page </span>'.$i.'</span></li>' : '<li class="page-item"><a class="page-link" href="'.get_pagenum_link($i).'"><span class="sr-only">Page </span>'.$i.'</a></li>';
        }

        if ($paged < $pages && $showitems < $pages)
            echo '<li class="page-item"><a class="page-link" href="'.get_pagenum_link($paged + 1).'" aria-label="Next Page"><span class="hidden-sm-down d-none d-md-block">Next </span>&rsaquo;</a></li>';

        if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages)
            echo '<li class="page-item"><a class="page-link" href="'.get_pagenum_link($pages).'" aria-label="Last Page"><span class="hidden-sm-down d-none d-md-block">Last </span>&raquo;</a></li>';

        echo '</ul>';
        echo '</nav>';
    }
}

## Исполняемый PHP код в контенте записи WordPress.
## [exec]PHP_код[/exec]
##
## @version: 1.0
if( 'Исполняемый PHP код в контенте' ){

    add_filter( 'the_content', 'content_exec_php', 0 );

    function content_exec_php( $content ){
        return preg_replace_callback( '/\[exec( off)?\](.+?)\[\/exec\]/s', '_content_exec_php', $content );
    }

    function _content_exec_php( $matches ){

        if( ' off' === $matches[1] ){
            return "\n\n<".'pre>'. htmlspecialchars( $matches[2] ) .'</pre'.">\n\n";
        }
        else {
            eval( "ob_start(); {$matches[2]}; \$exec_php_out = ob_get_clean();" );
            return $exec_php_out;
        }

    }

}
