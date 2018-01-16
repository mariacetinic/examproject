<?php
/**
 * Template Name: About us
 */

get_header();

?>
    <div class="container-skinny">

        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    </div>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <?php

                $image = get_field('hero');

                if( !empty($image) ): ?>

                    <section class="hero-images"><img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" /></section>

                <?php endif; ?>
                <div class="container-skinny">
                <section>
                    <article>
                        <?php the_title(); ?>
                    </article>
                    <article>
                        <?php

                        if( have_rows('menu_links') ):

                            while( have_rows('menu_links') ) : the_row();

                                $link = get_sub_field('link');

                                if( $link ): ?>

                                    <a class="button" href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>"><?php echo $link['title']; ?></a>

                                <?php endif;

                            endwhile;

                        endif;

                        ?>
                    </article>
                </section>

                <section>
                    <?php the_content(); ?>
                </section>
            </article>

        <?php endwhile; endif; ?>


</div>

<?php
get_footer();

