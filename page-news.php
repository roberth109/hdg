<?php
/**
 * Template Name: News
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


    <section class="news-header">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-12">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </section>

	

    <section class="articles">
        <div class="container">
            <?php 

			// get repeater field data
			$repeater = get_field('article');

			// vars
			$order = array();

			// populate order
			foreach( $repeater as $i => $row ) {
				$order[ $i ] = $row['id'];
			}

			// multisort
			array_multisort( $order, SORT_DESC, $repeater );

			// loop through repeater
			if( $repeater ): ?>
				<?php foreach( $repeater as $i => $row ): ?>
                    <div class="row mb-5">
                        <div class="col">
                            <h3><?php echo $row[ 'article_title' ]; ?></h3>
                            <p>Click here to read more.</p>
                            <?php $pdf = $row[ 'article_pdf' ]; ?>
                            <?php if ( $pdf ) : ?>
                                <a href="<?php echo $pdf['url']; ?>" target="_blank">Read More <i class="fa fa-long-arrow-right"></i></a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </section>
    
<?php
get_sidebar();
get_footer();
