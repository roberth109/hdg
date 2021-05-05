<?php
/**
 * Template Name: Community
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package hdg
 */

?>

<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
	<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-KFDLZFT');</script>
<!-- End Google Tag Manager -->
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KFDLZFT"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

	<header id="header" class="header container-fluid">
		<div class="row h-100">
			<div id="logo" class="logo col">
            <?php if ( have_rows( 'header' ) ) : ?>
	            <?php while ( have_rows( 'header' ) ) : the_row(); ?>
                <?php
                global $wp;
                $current_url = home_url( add_query_arg( array(), $wp->request ) );
                // vars
                $logo= get_sub_field( 'logo' );

                if( $logo): ?>
                    <a href="<?php echo $current_url; ?>">
                        <img src="<?php echo $logo; ?>" alt="<?php bloginfo( 'name' ); ?>">
                    </a>
                <?php endif; ?>
                <?php endwhile; ?>
            <?php endif; ?>
			</div>
			<nav id="main-menu" class="main-menu col">
				<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-2',
					'menu_id'        => 'menu-2',
				) );
				?>
			</nav>
			<div id="responsive_nav">
				<div class="nav-wrapper">
					<div></div>
				</div>
				<div class="hamburger">
					<span class="icon">
						<span></span>
						<span></span>
						<span></span>
					</span>
				</div>
			</div>
		</div>
	</header>

    <?php if ( have_rows( 'banner' ) ) : ?>
        <?php while ( have_rows( 'banner' ) ) : the_row(); ?>
            <?php if ( get_sub_field( 'switch' ) == 1 ) { ?>
                <?php 
                    $background = get_sub_field( 'background' ); 
                    $size = 'full';
                    $bg = wp_get_attachment_image_src( $background, $size );
                ?>
                <section id="banner" class="banner" style="background-image: url('<?php echo $bg[0]; ?>')">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-7">
                                <h1 class="reveal">
                                    <?php the_sub_field( 'title' ); ?>
                                </h1>
                                <h4 class="reveal"><?php the_sub_field( 'subtitle' ); ?></h4>
                                <?php the_sub_field( 'content' ); ?>
                                <?php $link = get_sub_field( 'link' ); ?>
                                <?php if ( $link ) : ?>
                                    <a class="button first reveal" href="<?php echo esc_url( $link['url'] ); ?>" target="<?php echo esc_attr( $link['target'] ); ?>"><i class="fa fa-mobile-phone"></i><?php echo esc_html( $link['title'] ); ?></a>
                                <?php endif; ?>
                                <?php $link2 = get_sub_field( 'link2' ); ?>
                                <?php if ( $link2 ) : ?>
                                    <a class="button button-blue reveal" href="<?php echo esc_url( $link2['url'] ); ?>" target="<?php echo esc_attr( $link2['target'] ); ?>"><i class="fa fa-mobile-phone"></i><?php echo esc_html( $link2['title'] ); ?></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </section>
            <?php } ?>
        <?php endwhile; ?>
    <?php endif; ?>

    <?php if ( have_rows( 'about' ) ) : ?>
        <?php while ( have_rows( 'about' ) ) : the_row(); ?>
            <?php if ( get_sub_field( 'showhide_block' ) == 1 ) { ?>
                <?php 
                    $background = get_sub_field( 'background' ); 
                    $size = 'full';
                    $bg = wp_get_attachment_image_src( $background, $size );
                ?>
                <section id="about" class="about" style="background-image: url('<?php echo $bg; ?>')">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-7 reveal">
                                <?php $image = get_sub_field( 'image' ); ?>
                                <?php if ( $image ) : ?>
                                    <img class="image" src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
                                <?php endif; ?>
                                <?php if ( have_rows( 'card' ) ) : ?>
                                    <?php while ( have_rows( 'card' ) ) : the_row(); ?>
                                        <div class="box text-center">
                                            <div class="top">
                                                <?php $icon = get_sub_field( 'icon' ); ?>
                                                <?php if ( $icon ) : ?>
                                                    <img src="<?php echo esc_url( $icon['url'] ); ?>" alt="<?php echo esc_attr( $icon['alt'] ); ?>" />
                                                <?php endif; ?>
                                                <?php the_sub_field( 'content' ); ?>
                                            </div>
                                            <div class="bot">
                                                <?php $button = get_sub_field( 'button' ); ?>
                                                <?php if ( $button ) : ?>
                                                    <a class="button" href="<?php echo esc_url( $button['url'] ); ?>" target="<?php echo esc_attr( $button['target'] ); ?>"><?php echo esc_html( $button['title'] ); ?></a>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                            </div>
                            <div class="col-lg-5">
                                <h2><?php the_sub_field( 'title' ); ?></h2>
                                <?php the_sub_field( 'content' ); ?>
                            </div>
                        </div>
                    </div>
                </section>
            <?php } ?>
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
                        <div class="row justify-content-center">
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
                                        <?php if ( $link ) : ?>
                                            <a href="<?php echo esc_url( $link['url'] ); ?>" target="<?php echo esc_attr( $link['target'] ); ?>"><?php echo esc_html( $link['title'] ); ?><i class="fa fa-long-arrow-right"></i>
                                        <?php endif; ?>
                                        </a>
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
            <?php if ( get_sub_field( 'showhide_block' ) == 1 ) { ?>
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
                                        <?php $button = get_sub_field( 'button' ); ?>
                                        <?php if ( $button ) : ?>
                                            <h2><?php the_sub_field( 'title' ); ?></h2>
                                            <?php the_sub_field( 'content' ); ?>
                                            <a class="button"><?php echo esc_html( $button['title'] ); ?></a>
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
            <?php } ?>
        <?php endwhile; ?>
    <?php endif; ?>

    <?php if ( have_rows( 'plans' ) ) : ?>
        <?php while ( have_rows( 'plans' ) ) : the_row(); ?>
            <?php if ( get_sub_field( 'showhide_block' ) == 1 ) { ?>
                <?php 
                    $background = get_sub_field( 'background' ); 
                    $size = 'full';
                    $bg = wp_get_attachment_image_src( $background, $size );
                ?>
                <section id="plans" class="plans" style="background-image: url('<?php echo $bg[0]; ?>')">
                    <div class="container text-center">
                        <h2 class="reveal"><?php the_sub_field( 'title' ); ?></h2>
                        <div class="menu-plan">
                            <div class="plan active" id="al">Assisted Living Floor Plans</div>
                            <div class="plan" id="mc">Memory Care Floor Plans</div>
                        </div>
                            <?php if ( have_rows( 'cards' ) ) : ?>
                                <div class="al">
                                    <div class="row justify-content-center">
                                    <?php while ( have_rows( 'cards' ) ) : the_row(); ?>
                                        <div class="col-lg-4 reveal">
                                            <div class="box">
                                                <h4><?php the_sub_field( 'plan' ); ?></h4>
                                                <div class="price">
                                                    <?php $price = get_sub_field( 'price' ); ?>
                                                    <?php if ( $price ) : ?>
                                                        <img src="<?php echo esc_url( $price['url'] ); ?>" alt="<?php echo esc_attr( $price['alt'] ); ?>" />
                                                    <?php endif; ?>
                                                </div>
                                                <?php $image = get_sub_field( 'image' ); ?>
                                                <?php if ( $image ) : ?>
                                                    <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php endwhile; ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php if ( have_rows( 'cards2' ) ) : ?>
                            <div class="mc">
                                <div class="row justify-content-center">
                                <?php while ( have_rows( 'cards2' ) ) : the_row(); ?>
                                    <div class="col-lg-4 reveal">
                                        <div class="box">
                                            <h4><?php the_sub_field( 'plan' ); ?></h4>
                                            <div class="price">
                                                <?php $price = get_sub_field( 'price' ); ?>
                                                <?php if ( $price ) : ?>
                                                    <img src="<?php echo esc_url( $price['url'] ); ?>" alt="<?php echo esc_attr( $price['alt'] ); ?>" />
                                                <?php endif; ?>
                                            </div>
                                            <?php $image = get_sub_field( 'image' ); ?>
                                            <?php if ( $image ) : ?>
                                                <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </section>
            <?php } ?>
        <?php endwhile; ?>
    <?php endif; ?>
    
    <?php if ( have_rows( 'flex_content' ) ) : ?>
        <?php while ( have_rows( 'flex_content' ) ) : the_row(); ?>
            <?php if ( get_sub_field( 'showhide_block' ) == 1 ) { ?>
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
            <?php } ?>
        <?php endwhile; ?>
    <?php endif; ?>

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

    <?php if ( have_rows( 'team' ) ) : ?>
        <?php while ( have_rows( 'team' ) ) : the_row(); ?>
            <?php if ( get_sub_field( 'showhide_block' ) == 1 ) { ?>
                <section id="team" class="team">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                                <h2><?php the_sub_field( 'title' ); ?></h2>
                                <?php the_sub_field( 'content' ); ?>
                            </div>
                            <div class="col-lg-6 reveal">
                                <?php $image = get_sub_field( 'image' ); ?>
                                <?php if ( $image ) : ?>
                                    <img class="image" src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </section>
            <?php } ?>
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
                            <div class="col-lg-7 reveal">
                                <div class="form">
                                    <h3><?php the_sub_field( 'community' ); ?></h3>
                                    <div class="numbers">
                                    <?php $phone = get_sub_field( 'phone' ); ?>
                                    <?php if ( $phone ) : ?>
                                        <a href="<?php echo esc_url( $phone['url'] ); ?>" target="<?php echo esc_attr( $phone['target'] ); ?>"><b>Phone</b> <?php echo esc_html( $phone['title'] ); ?></a>
                                    <?php endif; ?>
                                    <?php $fax = get_sub_field( 'fax' ); ?>
                                    <?php if ( $fax ) : ?>
                                        <a href="<?php echo esc_url( $fax['url'] ); ?>" target="<?php echo esc_attr( $fax['target'] ); ?>"><b>Fax</b> <?php echo esc_html( $fax['title'] ); ?></a>
                                    <?php endif; ?>
                                    </div>
                                    <h4><?php the_sub_field( 'address' ); ?></h4>
                                    <div class="form-container">
                                        <h5 class="gmaps">Get Directions</h5>
                                        <form action="https://maps.google.com/maps" class="search-form" method="get" target="_blank">
                                            <input type="text" id="getlocation" name="saddr" class="get-direction" placeholder="Enter address..." />
                                            <input type="hidden" name="daddr" value="<?php the_sub_field( 'address' ); ?>" />
                                            <input type="submit" class="location" value="&#xf124;" class="search-direction" />
                                        </form>
                                    </div>
                                </div>
                                <div class="map"><?php the_sub_field( 'content' ); ?></div>
                            </div>
                            <div class="col-lg-5">
                                <?php echo FrmFormsController::show_form(get_sub_field('form_id'), '', true, true); ?>
                            </div>
                        </div>
                    </div>
                </section>
            <?php endif; ?>
        <?php endwhile; ?>
    <?php endif; ?>

    <?php if ( have_rows( 'footer') ) : ?>
		<?php while ( have_rows( 'footer') ) : the_row(); ?>
			<?php
            // vars
            $background = get_sub_field('background');
            // thumbnail
            $size = 'bg2';
            $bg = $background['sizes'][ $size ];

            ?>
            <footer id="footer" class="footer">
                <div class="container">
                    <div class="row footer-top" style="background-image: url('<?php echo $bg; ?>')">
                        <div class="col-lg-2 footer-logo">
                            <?php if ( get_sub_field( 'logo') ) { ?>
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                                    <img src="<?php echo the_sub_field('logo'); ?>" alt="<?php bloginfo( 'name' ); ?>">
                                </a>
                            <?php } ?>	
                        </div>
                        <div class="col-lg-2 menu-services">
                            <h3>Services</h3>
                            <?php if( have_rows('services') ): ?>
                                <ul>
                                <?php while( have_rows('services') ): the_row(); ?>
                                    <?php $link = get_sub_field( 'link' ); ?>
                                    <?php if ( $link ) : ?>
                                        <li><a href="<?php echo esc_url( $link['url'] ); ?>" target="<?php echo esc_attr( $link['target'] ); ?>"><?php echo esc_html( $link['title'] ); ?></a></li>
                                    <?php endif; ?>
                                <?php endwhile; ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                        <div class="col-lg-3 menu-communities">
                            <h3>Communities</h3>
                            <?php if( have_rows('communities') ): ?>
                                <ul>
                                <?php while( have_rows('communities') ): the_row(); ?>
                                    <?php $link = get_sub_field( 'link' ); ?>
                                    <?php if ( $link ) : ?>
                                        <li><a href="<?php echo esc_url( $link['url'] ); ?>" target="<?php echo esc_attr( $link['target'] ); ?>"><?php echo esc_html( $link['title'] ); ?></a></li>
                                    <?php endif; ?>
                                <?php endwhile; ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                        <div class="col-lg-3 menu-links">
                            <h3>Important Links</h3>
                            <?php if( have_rows('links') ): ?>
                                <ul>
                                <?php while( have_rows('links') ): the_row(); ?>
                                    <?php $link = get_sub_field( 'link' ); ?>
                                    <?php if ( $link ) : ?>
                                        <li><a href="<?php echo esc_url( $link['url'] ); ?>" target="<?php echo esc_attr( $link['target'] ); ?>"><?php echo esc_html( $link['title'] ); ?></a></li>
                                    <?php endif; ?>
                                <?php endwhile; ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                        <div class="col-lg-2 social">
                            <h3>Social Media</h3>
							<div class="social-icons">
                                <?php if( have_rows('social_media') ): ?>
                                    <?php while( have_rows('social_media') ): the_row();

                                        // vars
                                        $social = get_sub_field('social_channel','option');
                                        $url = get_sub_field('social_url','option');
                                        ?>

                                        <a class="social-icon" href="<?php echo $url; ?>" target="_blank">
                                            <?php echo '<i class="fa fa-' . $social . '" aria-hidden="true"></i>'; ?>
                                        </a>

                                    <?php endwhile; ?>
                                <?php endif; ?>
                            </div>
						</div>
                    </div>
                    <div class="row footer-bottom align-items-center">
						<div class="col-lg-12 copy">
							<div class="copyright text-center">
								<?php the_sub_field( 'copyright','option' ); ?>
							</div>
						</div>
                    </div>
                </div>
            </footer>
        <?php endwhile; ?>
	<?php endif; ?>

<?php wp_footer(); ?>

</body>
</html>