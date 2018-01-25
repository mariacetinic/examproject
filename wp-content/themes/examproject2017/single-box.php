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
                        <h1 class="entry-title"><?php the_title(); ?></h1>
                    </header>
                <?php the_field('short_description'); ?>

                </article>
                <div class="price-stock-item">
                    <h2 class="sans"><?php the_field('box_price'); ?>&nbsp;kr</h2>
                    <span> <?php the_field('box_stock'); ?></span>
                </div>
                <form action="<?php the_permalink() ?>" method="post">
                    <input type="hidden" name="box_id" value="<?= $post->ID ?>">

                    <button type="submit">Add to cart</button>
                </form>
            </section>




    </section>
    <section class="container">
        <h2>Product list</h2>
        <ul class="custom-product-list">
            <?php


            if( have_rows('product_links') ): while ( have_rows('product_links') ) : the_row();

                $link = get_sub_field('single_product_link');

                if( $link ): ?>

                    <li>
                        <a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>"><?php echo $link['title']; ?></a>
                    </li>
                <?php endif; ?>

                <?php
            endwhile;

            else : //no rows found

            endif;

            ?>
        </ul>
    </section>
<?php endwhile; endif; ?>
<?php get_footer(); ?>