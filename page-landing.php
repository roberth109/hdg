<?php
/**
 * Template Name: Landing
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package hdg
 */

get_header();
?>
    <main id="page" class="site">

        <?php if ( have_rows( 'specials' ) ) : ?>
            <?php while ( have_rows( 'specials' ) ) : the_row(); ?>
                <?php if ( get_sub_field( 'showhide_block' ) == 1 ) : ?>
                <?php 
                    $background = get_sub_field( 'background' ); 
                    $size = 'full';
                    $bg = wp_get_attachment_image_src( $background, $size );
                ?>
                <section class="specials" style="background-image: url('<?php echo $bg[0]; ?>')">
                    <div class="container text-center">
                        <div class="row">
                            <div class="col-lg-auto">
                                <?php the_sub_field( 'content' ); ?>
                            </div>
                        </div>
                    </div>
                </section>
                <?php endif; ?>
            <?php endwhile; ?>
        <?php endif; ?>

        <?php if ( have_rows( 'header' ) ) : ?>
            <?php while ( have_rows( 'header' ) ) : the_row(); ?>
                <?php if ( get_sub_field( 'showhide_block' ) == 1 ) : ?>
                    <header id="site-header" class="site-header container-fluid">
                        <div class="row">
                            <div class="col-lg-auto logo">
                                <a href="<?php get_permalink(get_the_ID()); ?>">
                                    <?php $logo = get_sub_field( 'logo' ); ?>
                                    <?php if ( $logo ) : ?>
                                        <img src="<?php echo esc_url( $logo['url'] ); ?>" alt="<?php echo esc_attr( $logo['alt'] ); ?>" />
                                    <?php endif; ?>
                                </a>
                            </div>
                            <div class="col-lg-auto right desktop-only">
                                <?php $phone = get_sub_field( 'phone' ); ?>
                                <?php if ( $phone ) : ?>
                                    <a class="button green" href="<?php echo esc_url( $phone['url'] ); ?>" target="<?php echo esc_attr( $phone['target'] ); ?>"><i class="fa fa-mobile-phone"></i><?php echo esc_html( $phone['title'] ); ?></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </header>
                <?php endif; ?>
            <?php endwhile; ?>
        <?php endif; ?>

        <div id="content" class="site-content">

            <?php if ( have_rows( 'banner' ) ) : ?>
                <?php while ( have_rows( 'banner' ) ) : the_row(); ?>
                    <?php if ( get_sub_field( 'showhide_block' ) == 1 ) : ?>
                        <?php 
                            $background = get_sub_field( 'background' ); 
                            $size = 'full';
                            $bg = wp_get_attachment_image_src( $background, $size );
                        ?>
                        <section id="landing-banner" class="landing-banner" style="background-image: url('<?php echo $bg[0]; ?>')">
                            <div class="container">
                                <div class="row align-items-center">
                                    <div class="col-lg-6">
                                        <h1><?php the_sub_field( 'title' ); ?></h1>
                                        <h4><?php the_sub_field( 'subtitle' ); ?></h4>
                                        <?php $button = get_sub_field( 'button' ); ?>
                                        <?php if ( $button ) : ?>
                                            <a class="button" href="<?php echo esc_url( $button['url'] ); ?>" target="<?php echo esc_attr( $button['target'] ); ?>"><?php echo esc_html( $button['title'] ); ?></a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </section>
                    <?php endif; ?>
                <?php endwhile; ?>
            <?php endif; ?>

            <?php if ( have_rows( 'options' ) ) : ?>
                <?php while ( have_rows( 'options' ) ) : the_row(); ?>
                    <?php if ( get_sub_field( 'showhide_block' ) == 1 ) : ?>
                        <section class="options">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-6 left">
                                        <h2><?php the_sub_field( 'title' ); ?></h2>
                                        <?php the_sub_field( 'content' ); ?>
                                    </div>
                                    <div class="col-lg-6 right">
                                        <?php echo FrmFormsController::show_form(get_sub_field('form'), '', true, true); ?>
                                    </div>
                                </div>
                            </div>
                        </section>
                    <?php endif; ?>
                <?php endwhile; ?>
            <?php endif; ?>

            <?php if ( have_rows( 'survey' ) ) : ?>
                <?php while ( have_rows( 'survey' ) ) : the_row(); ?>
                    <?php if ( get_sub_field( 'showhide_block' ) == 1 ) : ?>
                        <?php 
                            $background = get_sub_field( 'background' ); 
                            $size = 'full';
                            $bg = wp_get_attachment_image_src( $background, $size );
                        ?>
                        <section class="survey" style="background-image: url('<?php echo $bg[0]; ?>')">
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <h3><?php the_sub_field( 'title' ); ?></h3>
										<?php $button = get_sub_field( 'button' ); ?>
                                        <?php if ( $button ) : ?>
                                            <a class="button button-blue" href="<?php echo esc_url( $button['url'] ); ?>" target="<?php echo esc_attr( $button['target'] ); ?>"><?php echo esc_html( $button['title'] ); ?></a>
                                        <?php endif; ?>
									</div>
                                </div>
                            </div>
                        </section>
                    <?php endif; ?>
                <?php endwhile; ?>
            <?php endif; ?>

            <?php if ( have_rows( 'services' ) ) : ?>
                <?php while ( have_rows( 'services' ) ) : the_row(); ?>
                    <?php if ( get_sub_field( 'showhide_block' ) == 1 ) { ?>
                        <?php 
                            $background = get_sub_field( 'background' ); 
                            $size = 'full';
                            $bg = wp_get_attachment_image_src( $background, $size );
                        ?>
                        <section id="services" class="services" style="background-image: url('<?php echo $bg[0]; ?>')">
                            <div class="container text-center">
                                <h2 class="reveal"><?php the_sub_field( 'title' ); ?></h2>
                                <?php the_sub_field('subtitle'); ?>
                                <div class="row">
                                    <?php if ( have_rows( 'service' ) ) : ?>
                                        <?php while ( have_rows( 'service' ) ) : the_row(); ?>
                                            <div class="col-lg-4 reveal">
                                                <div class="icon">
                                                    <?php $icon = get_sub_field( 'icon' ); ?>
                                                    <?php if ( $icon ) : ?>
                                                        <img src="<?php echo esc_url( $icon['url'] ); ?>" alt="<?php echo esc_attr( $icon['alt'] ); ?>" />
                                                    <?php endif; ?>
                                                </div>
                                                <h4><?php the_sub_field( 'title' ); ?></h4>
                                                <?php the_sub_field( 'content' ); ?>
                                                <?php $link = get_sub_field( 'link' ); ?>               
                                            </div>
                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </section>
                    <?php } ?>
                <?php endwhile; ?>
            <?php endif; ?>

            <?php if ( have_rows( 'gallery' ) ) : ?>
                <?php while ( have_rows( 'gallery' ) ) : the_row(); ?>
                    <?php if ( get_sub_field( 'showhide_block' ) == 1 ) : ?>
                        <?php 
                            $background = get_sub_field( 'background' ); 
                            $size = 'full';
                            $bg = wp_get_attachment_image_src( $background, $size );
                        ?>
                        <section id="gallery" class="gallery" style="background-image: url('<?php echo $bg[0]; ?>')">
                            <div class="container text-center">
                                <div class="gallery-grid">
                                    <?php if ( have_rows( 'cards' ) ) : ?>
                                        <?php while ( have_rows( 'cards' ) ) : the_row(); ?>
                                            <?php $image = get_sub_field( 'image' ); ?>
                                            <div class="item" style="background-image: url('<?php echo esc_url( $image['url'] ); ?>');">
                                                <?php $title = get_sub_field( 'title' ); ?>
                                                <?php if ( $title ) : ?>
                                                    <h2><?php echo $title; ?></h2>
                                                    <?php the_sub_field( 'content' ); ?>
                                                <?php endif; ?>
                                            </div>
                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                </div>
                                <div class="gallery-modal">
                                    <div class="gallery-content">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <div class="gallery-body">
                                            <?php if ( have_rows( 'cards' ) ) : ?>
                                                <?php while ( have_rows( 'cards' ) ) : the_row(); ?>
                                                    <?php $image = get_sub_field( 'image' ); ?>
                                                    <?php if ( $image ) : ?>
                                                        <div class="img">
                                                            <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
                                                        </div>
                                                    <?php endif; ?>
                                                <?php endwhile; ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    <?php endif; ?>
                <?php endwhile; ?>
            <?php endif; ?>

            <?php if ( have_rows( 'location' ) ) : ?>
                <?php while ( have_rows( 'location' ) ) : the_row(); ?>
                    <?php if ( get_sub_field( 'showhide_block' ) == 1 ) : ?>
                        <?php 
                            $background = get_sub_field( 'background' ); 
                            $size = 'full';
                            $bg = wp_get_attachment_image_src( $background, $size );
                        ?>
                        <section id="location" class="location" style="background-image: url('<?php echo $bg; ?>')">
                            <div class="container text-center">
                                <div class="row">
                                    <div class="col-lg-12 reveal">
                                        <div class="form">
                                            <div class="logo">
                                                <?php $logo = get_sub_field( 'logo' ); ?>
                                                <?php if ( $logo ) : ?>
                                                    <img src="<?php echo esc_url( $logo['url'] ); ?>" alt="<?php echo esc_attr( $logo['alt'] ); ?>" />
                                                <?php endif; ?>
                                            </div>
                                            <h3><?php the_sub_field( 'title' ); ?></h3>
                                            <h4><?php the_sub_field( 'address' ); ?></h4>
											<?php $link = get_sub_field( 'link' ); ?>
											<?php if ( $link ) : ?>
												<a href="<?php echo esc_url( $link['url'] ); ?>" target="<?php echo esc_attr( $link['target'] ); ?>"><?php echo esc_html( $link['title'] ); ?></a>
											<?php endif; ?>
                                            <div class="form-container">
                                                <h5 class="gmaps">Get Directions</h5>
                                                <form action="https://maps.google.com/maps" class="search-form" method="get" target="_blank">
                                                    <input type="text" id="getlocation" name="saddr" class="get-direction" placeholder="Enter address..." />
                                                    <input type="hidden" name="daddr" value="<?php the_sub_field( 'address' ); ?>" />
                                                    <input type="submit" class="location" value="&#xf124;" class="search-direction" />
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="map"><?php the_sub_field( 'content' ); ?></div>
                                </div>
                            </div>
                        </section>
                    <?php endif; ?>
                <?php endwhile; ?>
            <?php endif; ?>

        </div><!-- #content -->        

        <!--- footer --->
        <?php if ( have_rows( 'footer' ) ) : ?>
            <?php while ( have_rows( 'footer' ) ) : the_row(); ?>
                <?php if ( get_sub_field( 'showhide_block' ) == 1 ) : ?>
                    <footer id="site-footer" class="site-footer">
                        <div class="footer-top">
                            <div class="container">
                                <h2><?php the_sub_field( 'title' ); ?></h2>
                                <h4><?php the_sub_field( 'subtitle' ); ?></h4>
                                <div class="row">
                                    <?php if( have_rows('links') ): ?>
                                        <?php while( have_rows('links') ): the_row(); 
                                        
                                        $icon = get_sub_field('icon');
                                        $title = get_sub_field('subtitle');
                                        $link = get_sub_field('link');
                                        ?>
                                            <div class="col-lg-4">
                                                <div class="icon">
                                                    <?php if ( $icon ) : ?>
                                                        <div><img src="<?php echo esc_url( $icon['url'] ); ?>" alt="<?php echo esc_attr( $icon['alt'] ); ?>" /></div>
                                                    <?php endif; ?>
                                                </div>
                                                <span><?php echo $title; ?></span>
                                                <?php if ( $link ) : ?>
                                                    <a href="<?php echo esc_url( $link['url'] ); ?>" target="<?php echo esc_attr( $link['target'] ); ?>"><?php echo esc_html( $link['title'] ); ?></a>
                                                <?php endif; ?>
                                            </div>
                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="footer-bottom">
                            <div class="container">
                                <div class="line desktop-only">
                                    <div class="circle">
                                        <a href="#site-header"><i class="fa fa-angle-up"></i></a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 logo">
                                        <a href="#">
                                            <?php $logo = get_sub_field( 'logo' ); ?>
                                            <?php if ( $logo ) : ?>
                                                <img src="<?php echo esc_url( $logo['url'] ); ?>" alt="<?php echo esc_attr( $logo['alt'] ); ?>" />
                                            <?php endif; ?>
                                        </a>
                                    </div>
                                    <div class="col-lg-4 cr">
                                        <div class="copy">
                                            <?php the_sub_field( 'copyright' ); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </footer>
                <?php endif; ?>
            <?php endwhile; ?>
        <?php endif; ?>
        <!--- end-footer --->

    </main><!-- #page -->

<?php
get_sidebar();
get_footer();