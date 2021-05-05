<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package hdg
 */

get_header();
?>

	<?php 
        $background = get_field( 'bg' ); 
        $size = 'full';
        $bg = wp_get_attachment_image_src( $background, $size );
    ?>
    <section id="subbanner" class="subbanner" style="background-image: url('<?php echo $bg[0]; ?>')">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <h1 class="reveal">
                        <?php the_field( 'title' ); ?>
                    </h1>
                </div>
            </div>
        </div>
    </section>

    <section id="flex-content" class="flex-content">
        <div class="container">
            <?php while( have_rows('content') ) : the_row(); ?>
                <?php if( get_row_layout() == 'content-image') : ?>
                    <div class="row align-items-center content-image">
                        <div class="col-lg-6 content reveal">
                            <?php if ( have_rows('content2') ): ?>
                                <?php while( have_rows('content2') ) : the_row(); ?>
                                    <h2><?php the_sub_field('title'); ?></h2>
                                    <?php the_sub_field('content'); ?>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </div>
                        <div class="col-lg-6 image reveal">
                            <?php $image = get_sub_field( 'image' ); ?>
                            <?php if( $image ) : ?>
                                <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
                            <?php endif; ?>
                        </div>
                    </div>
                <?php elseif( get_row_layout() == 'image-content') : ?>
                    <div class="row align-items-center image-content">
                        <div class="col-lg-6 image reveal">
                            <?php $image = get_sub_field( 'image' ); ?>
                            <?php if( $image ) : ?>
                                <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
                            <?php endif; ?>
                        </div>
                        <div class="col-lg-6 content reveal">
                            <?php if ( have_rows('content2') ): ?>
                                <?php while( have_rows('content2') ) : the_row(); ?>
                                    <h2><?php the_sub_field('title'); ?></h2>
                                    <?php the_sub_field('content'); ?>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endwhile; ?>
        </div>
    </section>

<?php
get_sidebar();
get_footer();
