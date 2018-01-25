<?php
if (isset($_POST) && isset($_POST['box_id'])) {
    $products = get_field('box_products', $_POST['box_id']);
    foreach ($products as $product) {
        WC()->cart->add_to_cart( $product->ID );
    }

    wp_safe_redirect(wc_get_cart_url());
} ?>

<?php get_header(); ?>
    <section id="content" role="main">
        <header class="header">
            <h1 class="entry-title"><?php
                if (is_day()) {
                    printf(__('Daily Boxes: %s', 'blankslate'), get_the_time(get_option('date_format')));
                } elseif (is_month()) {
                    printf(__('Monthly Boxes: %s', 'blankslate'), get_the_time('F Y'));
                } elseif (is_year()) {
                    printf(__('Yearly Boxes: %s', 'blankslate'), get_the_time('Y'));
                } else {
                    _e('Boxes', 'blankslate');
                }
                ?></h1>
        </header>
        <section id="all-boxes">

            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <?php //get_template_part('entry'); ?>

                <div class="box-container">
                    <?php
                    $image = get_field('box_main_image');

                    if( !empty($image) ): ?>
                        <div class="box-img">
                            <a href="<?php the_permalink(); ?>">
                                <img src="<?php echo $image['url'] ?>" alt="<?php echo $image['alt'] ?>" />
                            </a>
                        </div>
                    <?php endif; ?>

                    <a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
                    <form action="<?php the_permalink() ?>" method="post">
                        <input type="hidden" name="box_id" value="<?= $post->ID ?>">
                        <button type="submit">Add to cart</button>
                    </form>
                </div>

            <?php endwhile; endif; ?>
        </section>
        <?php get_template_part('nav', 'below'); ?>
    </section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>