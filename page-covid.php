<?php
/**
 * Template Name: COVID
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

    <?php if ( have_rows( 'case' ) ) : ?>
        <?php while ( have_rows( 'case' ) ) : the_row(); ?>
            <?php 
                $background = get_sub_field( 'background' ); 
                $size = 'full';
                $bg = wp_get_attachment_image_src( $background, $size );
            ?>
            <section id="case" class="case" style="background-image: url('<?php echo $bg[0]; ?>')">
                <div class="container">
                    <div class="row text-center">
                        <div class="col-lg-12">
                            <?php $icon = get_sub_field( 'icon' ); ?>
                            <?php if ( $icon ) : ?>
                                <img src="<?php echo esc_url( $icon['url'] ); ?>" alt="<?php echo esc_attr( $icon['alt'] ); ?>" />
                            <?php endif; ?>
                            <h3><?php the_sub_field( 'title' ); ?></h3>
                            <?php the_sub_field( 'content' ); ?>
                        </div>
                    </div>
                </div>
            </section>
        <?php endwhile; ?>
    <?php endif; ?>

    <?php if ( have_rows( 'prevention' ) ) : ?>
        <?php while ( have_rows( 'prevention' ) ) : the_row(); ?>
            <section class="prevention">
                <div class="container">
                    <div class="row text-center">
                        <div class="col-lg-12">
                            <h2><?php the_sub_field( 'title' ); ?></h2>
                            <?php the_sub_field( 'content' ); ?>
                        </div>
                    </div>
                </div>
            </section>
        <?php endwhile; ?>
    <?php endif; ?>

    <?php if ( have_rows( 'safe' ) ) : ?>
        <?php while ( have_rows( 'safe' ) ) : the_row(); ?>
            <section class="safe">
                <div class="container text-center">
                    <h2><?php the_sub_field( 'title' ); ?></h2>
                    <?php the_sub_field( 'content' ); ?>
                    <div class="row text-center">
                        <?php if ( have_rows( 'cards' ) ) : ?>
                            <?php while ( have_rows( 'cards' ) ) : the_row(); ?>
                                <div class="col-lg-6">
                                    <div class="box">
                                        <div class="icon">
                                            <?php $icon = get_sub_field( 'icon' ); ?>
                                            <?php if ( $icon ) : ?>
                                                <img src="<?php echo esc_url( $icon['url'] ); ?>" alt="<?php echo esc_attr( $icon['alt'] ); ?>" />
                                            <?php endif; ?>
                                        </div>
                                        <?php the_sub_field( 'content' ); ?>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="box">
                                        <div class="icon">
                                            <?php $icon2 = get_sub_field( 'icon2' ); ?>
                                            <?php if ( $icon2 ) : ?>
                                                <img src="<?php echo esc_url( $icon2['url'] ); ?>" alt="<?php echo esc_attr( $icon2['alt'] ); ?>" />
                                            <?php endif; ?>
                                        </div>
                                        <?php the_sub_field( 'content2' ); ?>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                    <div class="note"><h5><?php the_sub_field( 'note' ); ?></h5></div>
                </div>
            </section>
        <?php endwhile; ?>
    <?php endif; ?>

    <?php if ( have_rows( 'continue' ) ) : ?>
        <?php while ( have_rows( 'continue' ) ) : the_row(); ?>
            <section class="continue">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <h2><?php the_sub_field( 'title' ); ?></h2>
                            <?php the_sub_field( 'content' ); ?>
                        </div>
                        <div class="col-lg-6">
                            <?php $image = get_sub_field( 'image' ); ?>
                            <?php if ( $image ) : ?>
                                <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </section>
        <?php endwhile; ?>
    <?php endif; ?>
    
    <?php if ( have_rows( 'tracing' ) ) : ?>
        <?php while ( have_rows( 'tracing' ) ) : the_row(); ?>
            <section class="tracing">
                <div class="container">
                    <div class="row">
                        <div class="col text-center">
                            <h2><?php the_sub_field( 'title' ); ?></h2>
                            <?php the_sub_field( 'content' ); ?>
                        </div>
                    </div>
                    <div class="row steps">
                        <?php if ( have_rows( 'steps' ) ) : ?>
                            <?php while ( have_rows( 'steps' ) ) : the_row(); ?>
                                <div class="col-lg-4 text-center">
                                    <div class="icon">
                                        <?php $icon = get_sub_field( 'icon' ); ?>
                                        <?php if ( $icon ) : ?>
                                            <img src="<?php echo esc_url( $icon['url'] ); ?>" alt="<?php echo esc_attr( $icon['alt'] ); ?>" />
                                        <?php endif; ?>
                                    </div>
                                    <?php the_sub_field( 'content' ); ?>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </section>
        <?php endwhile; ?>
    <?php endif; ?>

    <?php if ( have_rows( 'contact' ) ) : ?>
        <?php while ( have_rows( 'contact' ) ) : the_row(); ?>
            <?php 
                $background = get_sub_field( 'background' ); 
                $size = 'full';
                $bg = wp_get_attachment_image_src( $background, $size );
            ?>
            <section class="community" style="background-image: url('<?php echo $bg[0]; ?>')">
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
                            <?php $button = get_sub_field( 'button' ); ?>
                            <?php if ( $button ) : ?>
                                <a class="button button-blue" href="<?php echo esc_url( $button['url'] ); ?>" target="<?php echo esc_attr( $button['target'] ); ?>"><i class="fa fa-mobile-phone"></i> <?php echo esc_html( $button['title'] ); ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </section>
        <?php endwhile; ?>
    <?php endif; ?>

    <?php if ( have_rows( 'visits' ) ) : ?>
        <?php while ( have_rows( 'visits' ) ) : the_row(); ?>
            <section class="visits">
                <div class="container">
                    <h2><?php the_sub_field( 'title' ); ?></h2>
                    <div class="row">
                        <?php if ( have_rows( 'visit' ) ) : ?>
                            <?php while ( have_rows( 'visit' ) ) : the_row(); ?>
                                <div class="col-lg-4 text-center">
                                    <div class="icon">
                                        <?php $icon = get_sub_field( 'icon' ); ?>
                                        <?php if ( $icon ) : ?>
                                            <img src="<?php echo esc_url( $icon['url'] ); ?>" alt="<?php echo esc_attr( $icon['alt'] ); ?>" />
                                        <?php endif; ?>
                                    </div>
                                    <?php the_sub_field( 'content' ); ?>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                    <div class="bottom">
                        <?php the_sub_field( 'content' ); ?>
                    </div>
                </div>
            </section>
        <?php endwhile; ?>
    <?php endif; ?>

    <?php if ( have_rows( 'reunite' ) ) : ?>
        <?php while ( have_rows( 'reunite' ) ) : the_row(); ?>
            <section class="reunite">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <h2><?php the_sub_field( 'title' ); ?></h2>
                            <?php the_sub_field( 'content' ); ?>
                        </div>
                    </div>
                </div>
            </section>
        <?php endwhile; ?>
    <?php endif; ?>

    <?php if ( have_rows( 'cards' ) ) : ?>
        <?php while ( have_rows( 'cards' ) ) : the_row(); ?>
            <?php 
                $background = get_sub_field( 'background' ); 
                $size = 'full';
                $bg = wp_get_attachment_image_src( $background, $size );
            ?>
            <section class="cards" style="background-image: url('<?php echo $bg[0]; ?>')">
                <div class="container">
                    <div class="row text-center">
                        <?php if ( have_rows( 'card' ) ) : ?>
                            <?php while ( have_rows( 'card' ) ) : the_row(); ?>
                                <div class="col-lg-6">
                                    <div class="box">
                                        <div class="icon">
                                            <?php $icon = get_sub_field( 'icon' ); ?>
                                            <?php if ( $icon ) : ?>
                                                <img src="<?php echo esc_url( $icon['url'] ); ?>" alt="<?php echo esc_attr( $icon['alt'] ); ?>" />
                                            <?php endif; ?>
                                        </div>
                                        <?php the_sub_field( 'content' ); ?>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </section>
        <?php endwhile; ?>
    <?php endif; ?>

    <?php if ( have_rows( 'thank' ) ) : ?>
        <?php while ( have_rows( 'thank' ) ) : the_row(); ?>
            <section class="thank">
                <div class="container">
                    <div class="row text-center">
                        <div class="col">
                            <h1><?php the_sub_field( 'title' ); ?></h1>
                            <?php the_sub_field( 'content' ); ?>
                            <?php $button = get_sub_field( 'button' ); ?>
                            <?php if ( $button ) : ?>
                                <a class="button" href="<?php echo esc_url( $button['url'] ); ?>" target="<?php echo esc_attr( $button['target'] ); ?>"><i class="fa fa-mobile-phone"></i><?php echo esc_html( $button['title'] ); ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </section>
        <?php endwhile; ?>
    <?php endif; ?>

<?php
get_sidebar();
get_footer();
