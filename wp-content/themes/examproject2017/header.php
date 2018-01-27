<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />

<link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet"> 
<link href="https://fonts.googleapis.com/css?family=Gloria+Hallelujah" rel="stylesheet"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<?php wp_head(); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />
</head>
<body <?php body_class(); ?>>
<div id="wrapper" class="hfeed">
<header id="header" role="banner">
<section id="top-menu" class="grey-bg-color">
    <span>Free delivery from 300kr | 1-2 days delivery | Save time and energy</span>
</section>
<section id="branding">
    <div id="logo">
        <?php if ( is_front_page() || is_home() || is_front_page() && is_home() ) { echo ''; } ?>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_html( get_bloginfo( 'name' ) ); ?>" rel="home"><?php echo esc_html( get_bloginfo( 'name' ) ); ?>
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo-white.png" alt="" width="" height="" />
            </a>
        <?php if ( is_front_page() || is_home() || is_front_page() && is_home() ) { echo ''; } ?>
    </div>
    <!--<div id="site-description">
        <?php //bloginfo( 'description' ); ?>
    </div>  no need for that on the front page -->
    <div id="search">
        <?php get_search_form(); ?>
    </div>

    <!-- att använda span istället för i är mer semantiskt korrekt. -->
    <div id="shoppingcart">

       <div class="customericon">
        <span class="fa fa-shopping-basket custom-fa-size white-color" aria-hidden="true"></span>
        <a class="white-color" href="#"></a>
           <a class="cart-customlocation white" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>">
               <?php echo sprintf ( _n( '%d', '%d', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?> - <?php echo WC()->cart->get_cart_total(); ?>
           </a>
       </div>
    </div>

</section>
<nav id="menu" class="grey-bg-color" role="navigation">
<?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
<div id="menu-customer-items">
    <div class="menu-customer-item">

    <a class="" href="#"><span class="fa fa-headphones custom-fa-size" aria-hidden="true"></span>070 979 68 76</a>
    </div>
    &nbsp;&nbsp;&nbsp;
    <div class="menu-customer-item">
        <div class="loginicon">

        <?php if ( is_user_logged_in() ) { ?>
            <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('My Account','woothemes'); ?>"><span class="fa fa-user-circle custom-fa-size" aria-hidden="true"></span><?php _e('My Account','woothemes'); ?></a>
        <?php }
        else { ?>
            <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('Login / Register','woothemes'); ?>"><span class="fa fa-user-circle custom-fa-size" aria-hidden="true"></span><?php _e('Login / Register','woothemes'); ?></a>
        <?php } ?>
        </div>
    </div>
</div>
</nav>
</header>
<div id="container">