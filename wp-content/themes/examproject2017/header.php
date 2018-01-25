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
    <?php

    if( have_rows('contact_info') ):

        while( have_rows('contact_info') ) : the_row();

            $value = get_sub_field('contact_text');

            echo $value . '|';

        endwhile;

    endif;



    //vill ta bort sista tecknet
    //rtrim($values, '|');
    //echo substr($value, 0, -1);

    //echo substr_replace($value ,"",-1);
    ?>
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
    <div id="customer">
       <div class="customericon">
       <span class="fa fa-user-circle custom-fa-size white-color" aria-hidden="true"></span>
        <a class="white-color" href="#">Log In</a>
       </div>
       <div class="customericon">
        <span class="fa fa-shopping-basket custom-fa-size white-color" aria-hidden="true"></span>
        <a class="white-color" href="#">Cart</a>
       </div>
    </div>

</section>
<nav id="menu" class="grey-bg-color" role="navigation">
<?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
<div id="menu-customer-items">
    <div class="menu-customer-item">
    <span class="fa fa-headphones" aria-hidden="true"></span>&nbsp;
    <a class="" href="#">070 979 68 76</a>
    </div>
    &nbsp;&nbsp;&nbsp;
    <div class="menu-customer-item">
    <span class="fa fa-envelope" aria-hidden="true"></span>&nbsp;
    <a class="" href="#">contact@mydog.com</a>
    </div>
</div>
</nav>
</header>
<div id="container">