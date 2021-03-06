
<?php get_header(); ?>
    <section id="content" class="archive-box" role="main">
        <header class="header">
            <h1 class="entry-title">
                <?php
                /*if (is_day()) {
                    printf(__('Daily Boxes: %s', 'blankslate'), get_the_time(get_option('date_format')));
                } elseif (is_month()) {
                    printf(__('Monthly Boxes: %s', 'blankslate'), get_the_time('F Y'));
                } elseif (is_year()) {
                    printf(__('Yearly Boxes: %s', 'blankslate'), get_the_time('Y'));
                } else {
                    _e('Boxes', 'blankslate');
                }
                */?>
            </h1>
        </header>

        <section id="box-sidebar">
            <?php get_sidebar(); ?>
        </section>
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



                    <div class="product-cost">
                        <a href="<?php the_permalink(); ?>"><h2 class="sans"><?php the_title(); ?></h2></a>

                        <span class="sans price-stock"><?php the_field('box_price'); ?>&nbsp;kr</span>

                    </div>
                    <a href="<?php the_permalink(); ?>"><button>View box</button></a>


                </div>

            <?php endwhile; endif; ?>
        </section>
        <?php get_template_part('nav', 'below'); ?>
    </section>

<?php get_footer(); ?>