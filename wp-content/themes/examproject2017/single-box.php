<?php
if (isset($_POST) && isset($_POST['box_id'])) {
    $products = get_field('box_products', $_POST['box_id']);
    foreach ($products as $product) {
        WC()->cart->add_to_cart( $product->ID );
    }

    wp_safe_redirect(wc_get_cart_url());
}
//knappen fungerar inte.. om man inte har produkter i.. såklart. 

get_header(); ?>

    <section id="content" class="product-content" role="main">
        <?php if (have_posts()) : while (have_posts()) : the_post();
            $products = get_field('box_products');
            $image = get_field('box_main_image');
            ?>

            <section class="product-right">
                <?php

                if( !empty($image) ): ?>
                    <div class="box-img">
                        <a href="<?php the_permalink(); ?>">
                            <img src="<?php echo $image['url'] ?>" alt="<?php echo $image['alt'] ?>" />
                        </a>
                    </div>
                <?php endif; ?>
            </section>

            <section class="product-left">

                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="header">
                        <h1 class="entry-title"><?php the_title(); ?></h1> <?php edit_post_link(); ?>
                    </header>
                <?php the_field('short_description'); ?>
                </article>
                <form action="<?php the_permalink() ?>" method="post">
                    <input type="hidden" name="box_id" value="<?= $post->ID ?>">
                    <button type="submit">Add to cart</button>
                </form>
            </section>

        <?php endwhile; endif; ?>
    </section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>