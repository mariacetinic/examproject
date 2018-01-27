<?php
/**
 * Template Name: Text template
 */

get_header();

?>
</div>
    <div class="container-skinny">

        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    </div>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <?php

                $image = get_field('hero');

                if( !empty($image) ): ?>

                    <section class="hero-images"><img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" /></section>

                <?php endif; ?>

                <div class="container-skinny aboutus">
                <section>
                    <article>
                        <h1><?php the_title(); ?></h1>
                    </article>
                    <?php
                    if ( !wp_is_mobile() ) {
                        ?>
                        <article>
                            <?php wp_nav_menu( array( 'theme_location' => 'aside-menu-1', 'container_class' => 'my_custom_aside' ) ); ?>
                        </article>
                    <?php }
                    ?>



                </section>

                <section>
                    <?php the_content(); ?>
                </section>
            </article>

        <?php endwhile; endif; ?>

</div>


<?php
get_footer();

