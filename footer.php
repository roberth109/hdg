<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package hdg
 */

?>

	<?php if ( have_rows( 'footer', 'option' ) ) : ?>
		<?php while ( have_rows( 'footer', 'option' ) ) : the_row(); ?>
			<?php
            // vars
            $background = get_sub_field('background', 'option');
            // thumbnail
            $size = 'bg2';
            $bg = $background['sizes'][ $size ];

            ?>
            <footer id="footer" class="footer">
                <div class="container">
                    <div class="row footer-top" style="background-image: url('<?php echo $bg; ?>')">
                        <div class="col-lg-2 footer-logo">
                            <?php if ( get_sub_field( 'logo', 'option') ) { ?>
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                                    <img src="<?php echo the_sub_field('logo', 'option'); ?>" alt="<?php bloginfo( 'name' ); ?>">
                                </a>
                            <?php } ?>	
                        </div>
                        <div class="col-lg-2 menu-services">
                            <h3>Services</h3>
                            <?php if( have_rows('services', 'option') ): ?>
                                <ul>
                                <?php while( have_rows('services', 'option') ): the_row(); ?>
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
                            <?php if( have_rows('communities', 'option') ): ?>
                                <ul>
                                <?php while( have_rows('communities', 'option') ): the_row(); ?>
                                    <?php $link = get_sub_field( 'link' ); ?>
                                    <?php if ( $link ) : ?>
                                        <li><a href="<?php echo esc_url( $link['url'] ); ?>" target="<?php echo esc_attr( $link['target'] ); ?>"><?php echo esc_html( $link['title'] ); ?></a></li>
                                    <?php endif; ?>
                                <?php endwhile; ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                        <div class="col-lg-2 menu-links">
                            <h3>Important Links</h3>
                            <?php if( have_rows('links', 'option') ): ?>
                                <ul>
                                <?php while( have_rows('links', 'option') ): the_row(); ?>
                                    <?php $link = get_sub_field( 'link' ); ?>
                                    <?php if ( $link ) : ?>
                                        <li><a href="<?php echo esc_url( $link['url'] ); ?>" target="<?php echo esc_attr( $link['target'] ); ?>"><?php echo esc_html( $link['title'] ); ?></a></li>
                                    <?php endif; ?>
                                <?php endwhile; ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                        <div class="col-lg-3">
                            <?php $button = get_sub_field( 'button', 'option' ); ?>
                            <?php if ( $button ) : ?>
                                <a class="button" href="<?php echo esc_url( $button['url'] ); ?>" target="<?php echo esc_attr( $button['target'] ); ?>"><?php echo esc_html( $button['title'] ); ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="row footer-bottom align-items-center">
						<div class="col-lg-6 copy">
							<div class="copyright">
								<?php the_sub_field( 'copyright','option' ); ?>
							</div>
						</div>
						<div class="col-lg-6 social">
							<div class="social-icons">
                                <?php if( have_rows('social_media', 'option') ): ?>
                                    <?php while( have_rows('social_media', 'option') ): the_row();

                                        // vars
                                        $social = get_sub_field('social_channel','option');
                                        $url = get_sub_field('social_url','option');
                                        ?>

                                        <a class="social-icon" href="<?php echo $url; ?>">
                                            <?php echo '<i class="fa fa-' . $social . '" aria-hidden="true"></i>'; ?>
                                        </a>

                                    <?php endwhile; ?>
                                <?php endif; ?>
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
