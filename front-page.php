<?php
/**
 * The Homepage template file
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package hdg
 */

get_header();
?>

    <?php if ( have_rows( 'specials' ) ) : ?>
        <?php while ( have_rows( 'specials' ) ) : the_row(); ?>
            <?php if ( get_sub_field( 'showhide_block' ) == 1 ) : ?>
            <?php 
                $background = get_sub_field( 'background' ); 
                $size = 'full';
                $bg = wp_get_attachment_image_src( $background, $size );
            ?>
            <section class="specials" style="background-image: url('<?php echo $bg[0]; ?>')">
                <div class="container-full text-center">
                    <div class="row">
                        <div class="col-lg-auto">
                            <?php the_sub_field( 'content' ); ?>
                        </div>
                        <div class="col-lg-auto">
                            <?php $link = get_sub_field( 'link' ); ?>
                            <?php if ( $link ) : ?>
                                <a class="button button-blue" href="<?php echo esc_url( $link['url'] ); ?>" target="<?php echo esc_attr( $link['target'] ); ?>"><?php echo esc_html( $link['title'] ); ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </section>
            <?php endif; ?>
        <?php endwhile; ?>
    <?php endif; ?>

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
                            <div class="col-lg-6">
                                <h1 class="reveal">
                                    <?php the_sub_field( 'title' ); ?>
                                </h1>
                                <h4 class="reveal"><?php the_sub_field( 'subtitle' ); ?></h4>
                                <?php the_sub_field( 'content' ); ?>
                                <?php $link = get_sub_field( 'link' ); ?>
                                <?php if ( $link ) : ?>
                                    <a class="button first reveal" href="<?php echo esc_url( $link['url'] ); ?>" target="<?php echo esc_attr( $link['target'] ); ?>"><?php echo esc_html( $link['title'] ); ?></a>
                                <?php endif; ?>
                                <?php $link2 = get_sub_field( 'link2' ); ?>
                                <?php if ( $link2 ) : ?>
                                    <a class="button button-blue reveal" href="<?php echo esc_url( $link2['url'] ); ?>" target="<?php echo esc_attr( $link2['target'] ); ?>"><?php echo esc_html( $link2['title'] ); ?></a>
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
                                    <div class="row">
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
                                <div class="row">
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
                                            <p><?php the_sub_field( 'content' ); ?></p>
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

    <?php if ( have_rows( 'mission' ) ) : ?>
        <?php while ( have_rows( 'mission' ) ) : the_row(); ?>
            <?php if ( get_sub_field( 'showhide_block' ) == 1 ) { ?>
                <section id="mission" class="mission">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6 reveal">
                                <?php $image = get_sub_field( 'image' ); ?>
                                <?php if ( $image ) : ?>
                                    <img class="image" src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
                                <?php endif; ?>
                            </div>
                            <div class="col-lg-6">
                                <h2><?php the_sub_field( 'title' ); ?></h2>
                                <?php the_sub_field( 'content' ); ?>
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
                        <h2 class="reveal"><?php the_sub_field( 'title' ); ?></h2>
                        <div class="menu-loc">
                            <div class="loc active" id="ph"><i class="fa fa-map-marker"></i>Dimensions Living Prospect Heights</div>
                            <div class="loc" id="br"><i class="fa fa-map-marker"></i>Dimensions Living Burr Ridge</div>
                        </div>
                        <?php if ( have_rows( 'prospect' ) ) : ?>
                            <?php while ( have_rows( 'prospect' ) ) : the_row(); ?>
                            <div class="prospect">
                                <div class="row">
                                    <div class="col-lg-5 reveal">
                                        <div class="form">
                                            <h3><?php the_sub_field( 'community' ); ?></h3>
                                            <h4><?php the_sub_field( 'address' ); ?></h4>
                                            <div class="form-container">
                                                <h5 class="gmaps">Get Directions</h5>
                                                <form action="https://maps.google.com/maps" class="search-form" method="get" target="_blank">
                                                    <input type="text" id="getlocation" name="saddr" class="get-direction" placeholder="Enter address..." />
                                                    <input type="hidden" name="daddr" value="700 E Euclid Ave, Prospect Heights, IL 60070, USA" />
                                                    <input type="submit" class="location" value="&#xf124;" class="search-direction" />
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-7 map"><?php the_sub_field( 'content' ); ?></div>
                                </div>
                            </div>  
                            <?php endwhile; ?>
                        <?php endif; ?>
                        <?php if ( have_rows( 'burr' ) ) : ?>
                            <?php while ( have_rows( 'burr' ) ) : the_row(); ?>
                            <div class="burr">
                                <div class="row">
                                    <div class="col-lg-5 reveal">
                                        <div class="form">
                                            <h3><?php the_sub_field( 'community' ); ?></h3>
                                            <h4><?php the_sub_field( 'address' ); ?></h4>
                                            <div class="form-container">
                                                <h5 class="gmaps">Get Directions</h5>
                                                <form action="https://maps.google.com/maps" class="search-form" method="get" target="_blank">
                                                    <input type="text" id="getlocation" name="saddr" class="get-direction" placeholder="Enter address..." />
                                                    <input type="hidden" name="daddr" value="6801 High Grove Blvd. Burr Ridge, IL 60527, USA" />
                                                    <input type="submit" class="location" value="&#xf124;" class="search-direction" />
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-7 map"><?php the_sub_field( 'content' ); ?></div>
                                </div>
                            </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                </section>
            <?php endif; ?>
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
