<?php /* Template Name: Front page */ ?>

<?php get_header(); ?>


<div class="hero-images">
    <?php
        if( get_field('first_hero') ):
            $attachment_id = get_field('first_hero');
            $size = "full"; // (thumbnail, medium, large, full or custom size)
            $image = wp_get_attachment_image_src( $attachment_id, $size );
            $alt_text = get_post_meta($attachment_id , '_wp_attachment_image_alt', true);
            ?>
                    <img alt="<?php echo $alt_text; ?>" src="<?php echo $image[0]; ?>" />

            <?php

        else:
            ?>

    <?php endif;?>
    <div class="overlay-hero-title">
        <h1 class="sans"><?php the_field('first_hero_title'); ?></h1>
        <h2><?php the_field('purple_hero_title'); ?></h2>
        <h2 class="sans"><?php the_field('third_hero_title'); ?></h2>
        <?php

        $link = get_field('button_buy_');

        if( $link ): ?>

          <a class="button" href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>">
                  <?php echo $link['title']; ?>
          </a>

        <?php endif; ?>
    </div>
</div>

<div class="icons-section">
    <?php

    // check if the repeater field has rows of data
    if( have_rows('description_of_mydog') ): while ( have_rows('description_of_mydog') ) : the_row();

            // display a sub field value
            $icon = get_sub_field('icon');
            $title = get_sub_field('title');
            $text = get_sub_field('text'); ?>

        <div class="icon-item">
            <img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt'] ?>" />

            <h2><?php echo $title ?></h2>
            <p><?php echo $text ?></p>
        </div>

    <?php

            endwhile;
        else :
    endif;

    ?>
</div>

<section id="subscription">
    <h1><?php the_field('header_sub'); ?></h1>
    <?php the_field('content_sub'); ?>
    <?php the_field('sale_products'); ?>
</section>

<?php get_footer(); ?>
