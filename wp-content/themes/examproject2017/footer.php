<div class="clear"></div>
</div>
<footer id="footer" class="grey-bg-color" role="contentinfo">

<div id="footer-content">
    <div class="footer-item">
        <h5>Assortment</h5>
        <?php wp_nav_menu( array( 'theme_location' => 'footer-menu-1', 'container_class' => 'footer-item' ) ); ?>
    </div>
    <div class="footer-item">
        <h5>Customer service</h5>
        <?php wp_nav_menu( array( 'theme_location' => 'footer-menu-2', 'container_class' => 'my_extra_menu_class' ) ); ?>
    </div>

    <div class="footer-item">
        <h5>Follow us</h5>
        <?php wp_nav_menu( array( 'theme_location' => 'footer-menu-3', 'container_class' => 'my_extra_menu_class' ) ); ?>
    </div>

    <div class="footer-item">
    <?php if ( is_front_page() || is_home() || is_front_page() && is_home() ) { echo '<h2>'; } ?><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_html( get_bloginfo( 'name' ) ); ?>" rel="home"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a><?php if ( is_front_page() || is_home() || is_front_page() && is_home() ) { echo '</h2>'; } ?>
    <div id="footer-img"><img alt="MyDog Logo" src="<?php bloginfo('stylesheet_directory');?>/img/trygg_e-handel_hanglas_300.png" /></div>
    
</div>
</div>

</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>