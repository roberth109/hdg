<?php
/**
 * Template Name: Careers
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

    <section class="properties">
        <div class="container text-center">
            <h2><?php the_field( 'header' ); ?></h2>
            <div class="menu-prop">
                <div class="prop active" id="il">Illinois</div>
                <div class="prop" id="wc">Wisconsin</div>
            </div>
            <div class="il">
                <div class="row">
                    <?php if ( have_rows( 'property' ) ) : ?>
                        <?php while ( have_rows( 'property' ) ) : the_row(); ?>
                            <div class="col-lg-5">
                                <div class="box">
                                    <?php $img = get_sub_field( 'img' ); ?>
                                    <?php if( $img ) : ?>
                                        <img src="<?php echo esc_url( $img['url'] ); ?>" alt="<?php echo esc_attr( $img['alt'] ); ?>" />
                                    <?php endif; ?>
                                    <?php the_sub_field('address'); ?>
                                    <?php $button = get_sub_field( 'button' ); ?>
                                    <?php if ( $button ) : ?>
                                        <a class="button button-blue" href="<?php echo esc_url( $button['url'] ); ?>" target="<?php echo esc_attr( $button['target'] ); ?>"><?php echo esc_html( $button['title'] ); ?></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="wc">
                <div class="row">
                    <?php if ( have_rows( 'property2' ) ) : ?>
                        <?php while ( have_rows( 'property2' ) ) : the_row(); ?>
                            <div class="col-lg-5">
                                <div class="box">
                                    <?php $img = get_sub_field( 'img' ); ?>
                                    <?php if( $img ) : ?>
                                        <img src="<?php echo esc_url( $img['url'] ); ?>" alt="<?php echo esc_attr( $img['alt'] ); ?>" />
                                    <?php endif; ?>
                                    <?php the_sub_field('address'); ?>
                                    <?php $button = get_sub_field( 'button' ); ?>
                                    <?php if ( $button ) : ?>
                                        <a class="button button-blue" href="<?php echo esc_url( $button['url'] ); ?>" target="<?php echo esc_attr( $button['target'] ); ?>"><?php echo esc_html( $button['title'] ); ?></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

<?php
get_sidebar();
get_footer();
