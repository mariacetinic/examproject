<?php
if (isset($_POST) && isset($_POST['box_id'])) {
    $products = get_field('box_products', $_POST['box_id']);
    foreach ($products as $product) {
        WC()->cart->add_to_cart( $product->ID );
    }

    wp_safe_redirect(wc_get_cart_url());
}
get_header(); ?>
    <section id="content" role="main">
        <?php if (have_posts()) : while (have_posts()) : the_post();
            $products = get_field('box_products');
            ?>
            <form action="<?php the_permalink() ?>" method="post">
                <input type="hidden" name="box_id" value="<?= $post->ID ?>">
                <button type="submit">Add box to cart</button>
            </form>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="header">
                    <h1 class="entry-title"><?php the_title(); ?></h1> <?php edit_post_link(); ?>
                </header>
                <section class="entry-content">
                    <?php if (has_post_thumbnail()) {
                        the_post_thumbnail();
                    } ?>
                    <?php the_content(); ?>
                    <div class="entry-links"><?php wp_link_pages(); ?></div>
                </section>
            </article>
            <?php if (!post_password_required()) comments_template('', true); ?>
        <?php endwhile; endif; ?>
    </section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>