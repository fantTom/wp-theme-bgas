<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>
</div><!-- .content-->
<p>ПАРТНЕРЫ</p>
<ul class="partners">
    <li><a href="http://bsac.by/"><img src="<?= get_stylesheet_directory_uri()?> /img/bsac.png" alt="bsac" height="50" ></a> </li>
    <li><a href="http://zte.ru/"><img src="<?= get_stylesheet_directory_uri()?>  /img/zte.png" alt="zte" height="50"></a></li>
    <li><a href="http://si.by/"><img src="<?= get_stylesheet_directory_uri()?>  /img/svjazinvest.png" alt="svjazinvest" height="50"></a></li>
    <li><a href="https://www.cisco.com/"><img src="<?= get_stylesheet_directory_uri()?>  /img/cisco.png" alt="cisco" height="50"></a></li>
    <li><a href="http://www.belpost.by/"><img src="<?= get_stylesheet_directory_uri()?>  /img/belpochta.png" alt="belpochta" height="50"></a></li>
</ul>


<div class="footer">
    <a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a> Copyright © <?= date('Y'); ?>. Все права защищены.
    <div class="right_icons">
        <a class="facebook" href="https://www.facebook.com">Facebook</a>
        <a class="twitter" href="https://twitter.com/">Twitter</a>
        <a class="dribbble" href="https://dribbble.com/">Dribbble</a>
    </div>
</div>

</div><!-- .conteiner-->

<?php wp_footer(); ?>
</body>
</html>
