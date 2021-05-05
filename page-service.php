<?php
/**
 * Template Name: Service
 *
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

    <?php if ( have_rows( 'block_content' ) ) : ?>
        <?php while ( have_rows( 'block_content' ) ) : the_row(); ?>
            <section class="block">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <?php $image = get_sub_field( 'image' ); ?>
                            <?php if ( $image ) : ?>
                                <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
                            <?php endif; ?>
                        </div>
                        <div class="col-lg-6">
                            <h2><?php the_sub_field( 'title' ); ?></h2>
                            <?php the_sub_field( 'content' ); ?>
                        </div>
                    </div>
                </div>
            </section>
        <?php endwhile; ?>
    <?php endif; ?>

    <?php if ( have_rows( 'second_content' ) ) : ?>
        <?php while ( have_rows( 'second_content' ) ) : the_row(); ?>
            <?php 
                $background = get_sub_field( 'background' ); 
                $size = 'full';
                $bg = wp_get_attachment_image_src( $background, $size );
            ?>
            <section class="second" style="background-image: url('<?php echo $bg[0]; ?>')">
                <div class="container">
                    <div class="row">
                        <div class="col text-center">
                            <h2><?php the_sub_field( 'title' ); ?></h2>
                            <?php the_sub_field( 'content' ); ?>
                        </div>
                    </div>
                </div>
            </section>
        <?php endwhile; ?>
    <?php endif; ?>

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

    <?php if ( have_rows( 'lists' ) ) : ?>
        <?php while ( have_rows( 'lists' ) ) : the_row(); ?>
            <?php if ( get_sub_field( 'showhide_block' ) == 1 ) { ?>
                <section class="lists">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <h2><?php the_sub_field( 'title' ); ?></h2>
                                <div class="box">
                                    <?php the_sub_field( 'content' ); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            <?php } ?>
        <?php endwhile; ?>
    <?php endif; ?>

    <?php if ( have_rows( 'schedule' ) ) : ?>
        <?php while ( have_rows( 'schedule' ) ) : the_row(); ?>
            <?php if ( get_sub_field( 'showhide_block' ) == 1 ) { ?>
                <?php 
                    $background = get_sub_field( 'background' ); 
                    $size = 'full';
                    $bg = wp_get_attachment_image_src( $background, $size );
                ?>
                <section id="schedule" class="schedule" style="background-image: url('<?php echo $bg[0]; ?>')">
                    <div class="container text-center">
                        <div class="row">
                            <div class="col-lg-3">
                                <h2 class="reveal"><?php the_sub_field( 'title' ); ?></h2>
                            </div>
                            <?php if ( have_rows( 'card' ) ) : ?>
                                <?php while ( have_rows( 'card' ) ) : the_row(); ?>
                                    <div class="col-lg-3 reveal">
                                        <div class="box">
                                            <?php $icon = get_sub_field( 'icon' ); ?>
                                            <?php if ( $icon ) : ?>
                                                <div class="icon">
                                                    <img src="<?php echo esc_url( $icon['url'] ); ?>" alt="<?php echo esc_attr( $icon['alt'] ); ?>" />
                                                </div>
                                            <?php endif; ?>
                                            <?php the_sub_field( 'content' ); ?>
                                            <?php $button = get_sub_field( 'button' ); ?>
                                            <?php if ( $button ) : ?>
                                                <a class="button" href="<?php echo esc_url( $button['url'] ); ?>" target="<?php echo esc_attr( $button['target'] ); ?>"><?php echo esc_html( $button['title'] ); ?></a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </section>
            <?php } ?>
        <?php endwhile; ?>
    <?php endif; ?>

<?php
get_sidebar();
get_footer();
