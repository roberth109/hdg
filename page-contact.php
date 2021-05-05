<?php
/**
 * Template Name: Contact
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

    <section class="cform">
        <div class="container">
			<div class="row">
				<div class="col-lg-12">
					<?php echo FrmFormsController::show_form(get_field('form_ph'), '', true, true); ?>
				</div>
			</div>
        </div>
    </section>

<?php
get_sidebar();
get_footer();
