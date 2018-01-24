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

                    <h2><?php the_title(); ?></h2>
                </div>

            <?php endwhile; endif; ?>
        </section>
        <?php get_template_part('nav', 'below'); ?>
    </section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>