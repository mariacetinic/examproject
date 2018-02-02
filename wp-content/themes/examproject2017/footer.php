<div class="clear"></div>
</div>
<footer id="footer" class="grey-bg-color" role="contentinfo">

<div id="footer-content">
    <div class="footer-item">
        <h4>Assortment</h4>
        <?php wp_nav_menu( array( 'theme_location' => 'footer-menu-1', 'container_class' => 'footer-item' ) ); ?>
    </div>
    <div class="footer-item">
        <h4>Customer service</h4>
        <?php wp_nav_menu( array( 'theme_location' => 'footer-menu-2', 'container_class' => 'my_extra_menu_class' ) ); ?>
    </div>

    <div class="footer-item">
        <h4>Follow us</h4>
        <?php wp_nav_menu( array( 'theme_location' => 'footer-menu-3', 'container_class' => 'my_extra_menu_class' ) ); ?>
    </div>

    <div class="footer-item">
    <?php if ( is_front_page() || is_home() || is_front_page() && is_home() ) { echo '<h2>'; } ?><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_html( get_bloginfo( 'name' ) ); ?>" rel="home"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a><?php if ( is_front_page() || is_home() || is_front_page() && is_home() ) { echo '</h2>'; } ?>
    <div id="footer-img"><img alt="MyDog Logo" src="<?php bloginfo('stylesheet_directory');?>/img/trygg_e-handel_hanglas_300.png" /></div>
    
</div>
</div>

</footer>


    <?php
    //tycker det är en bra lösning så länge. Kände det var onödigt att leta upp alla bankloggor, ordna så det ser snyggt ut osv när jag lika väl kunde fokusera på annat kul.
    if( get_field('banks') ):
        $attachment_id = get_field('banks');
        $size = "full"; // (thumbnail, medium, large, full or custom size)
        $image = wp_get_attachment_image_src( $attachment_id, $size );
        $alt_text = get_post_meta($attachment_id , '_wp_attachment_image_alt', true);
        ?>
        <img alt="<?php echo $alt_text; ?>" src="<?php echo $image[0]; ?>" />


        <?php

    else:
        ?>

    <?php endif;?>

<?php wp_footer(); ?>
<script src="<?php bloginfo('stylesheet_directory');?>/js/script.js"></script>

</body>
</html>