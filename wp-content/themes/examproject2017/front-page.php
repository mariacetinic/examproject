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

           <button> <a class="button" href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>"><?php echo $link['title']; ?></a></button>

        <?php endif; ?>
    </div>
</div>

<div class="hero-images">
    <?php
        if( get_field('second_hero') ):
            $attachment_id = get_field('second_hero');
            $size = "full"; // (thumbnail, medium, large, full or custom size)
            $image = wp_get_attachment_image_src( $attachment_id, $size );
            $alt_text = get_post_meta($attachment_id , '_wp_attachment_image_alt', true);
            ?>
                    <img alt="<?php echo $alt_text; ?>" src="<?php echo $image[0]; ?>" />

            <?php

        else:
            ?>

    <?php endif;?>
</div>

<section id="subscription">
    <h1><?php the_field('header_sub'); ?></h1>
    <?php the_field('content_sub'); ?>
</section>

<?php get_footer(); ?>
