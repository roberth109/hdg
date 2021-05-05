<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
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
			<?php
			// vars
			$general_settings= get_field('general_settings','option');

			if( $general_settings): ?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
					<img src="<?php echo $general_settings['logo']; ?>" alt="<?php bloginfo( 'name' ); ?>">
				</a>
			<?php endif; ?>
			</div>
			<nav id="main-menu" class="main-menu col">
				<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
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
