<?php
/**
 * Template Name: Custom Home
 */

get_header(); ?>

<main id="maincontent" role="main">
	<?php do_action( 'vw_construction_estate_above_slider' ); ?>

	<?php if( get_theme_mod( 'vw_construction_estate_slider_hide_show', false) != '' || get_theme_mod( 'vw_construction_estate_resp_slider_hide_show', false) != '') { ?>
	  	<section class="slider">
		    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" data-bs-interval="<?php echo esc_attr(get_theme_mod( 'vw_construction_estate_slider_speed',4000)) ?>">
		      <?php $vw_construction_estate_slider_page = array();
		        for ( $count = 1; $count <= 4; $count++ ) {
		          $mod = intval( get_theme_mod( 'vw_construction_estate_slider_page' . $count ));
		          if ( 'page-none-selected' != $mod ) {
		            $vw_construction_estate_slider_page[] = $mod;
		          }
		        }
		        if( !empty($vw_construction_estate_slider_page) ) :
		          $args = array(
		            'post_type' => 'page',
		            'post__in' => $vw_construction_estate_slider_page,
		            'orderby' => 'post__in'
		          );
		          $query = new WP_Query( $args );
		          if ( $query->have_posts() ) :
		            $i = 1;
		      ?>     
		      <div class="carousel-inner" role="listbox">
		        <?php  while ( $query->have_posts() ) : $query->the_post(); ?>
		          <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
		            <?php the_post_thumbnail(); ?>
		            <div class="carousel-caption">
		              <div class="inner_carousel">
		                <h1><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
		                <p><?php $excerpt = get_the_excerpt(); echo esc_html( vw_construction_estate_string_limit_words( $excerpt, esc_attr(get_theme_mod('vw_construction_estate_slider_excerpt_number','30')))); ?></p>
		                <?php if( get_theme_mod('vw_construction_estate_slider_button_text','DISCOVER MORE') != ''){ ?>
			                <div class="more-btn">              
			                  <a href="<?php echo esc_url(get_permalink()); ?>"><?php echo esc_html(get_theme_mod('vw_construction_estate_slider_button_text',__('DISCOVER MORE','vw-construction-estate')));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('vw_construction_estate_slider_button_text',__('DISCOVER MORE','vw-construction-estate')));?></span></a>
			                </div>
			            <?php } ?>
		              </div>
		            </div>
		          </div>
		        <?php $i++; endwhile; 
		        wp_reset_postdata();?>
		      </div>
		      <?php else : ?>
		          <div class="no-postfound"></div>
		        <?php endif;
		      endif;?>
		      <a class="carousel-control-prev" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev" role="button">
                <span class="carousel-control-prev-icon w-auto h-auto" aria-hidden="true"><i class="fas fa-angle-left"></i></span>
                <span class="screen-reader-text"><?php esc_html_e( 'Previous','vw-construction-estate' );?></span>
              </a>
              <a class="carousel-control-next" data-bs-target="#carouselExampleCaptions" data-bs-slide="next" role="button">
                <span class="carousel-control-next-icon w-auto h-auto" aria-hidden="true"><i class="fas fa-angle-right"></i></span>
                <span class="screen-reader-text"><?php esc_html_e( 'Next','vw-construction-estate' );?></span>
              </a>
		    </div>  
	    	<div class="clearfix"></div>
	  	</section> 
	<?php }?>

	<?php do_action( 'vw_construction_estate_below_slider' ); ?>

	<?php /*--Contact Us--*/?>
	<?php if( get_theme_mod( 'vw_construction_estate_contact_number') != '' || get_theme_mod( 'vw_construction_estate_contact_title' )!= '' ||get_theme_mod( 'vw_construction_estate_contact_content' )!= ''||get_theme_mod( 'vw_construction_estate_contact_link' )!= ''){ ?>
		<section id="contact">
			<div class="row m-0">
				<div class="col-lg-3 col-md-3 contact-no">
					<?php if( get_theme_mod('vw_construction_estate_contact_number') != ''){ ?>
			    		<i class="<?php echo esc_attr(get_theme_mod('vw_construction_estate_contact_number_icon','fas fa-phone-square')); ?>"></i><span class="subtitle"><a href="tel:<?php echo esc_attr( get_theme_mod('vw_construction_estate_contact_number','') ); ?>"><?php echo esc_html(get_theme_mod('vw_construction_estate_contact_number',''));?></a></span>
			    	<?php }?>
				</div>
				<div class="col-lg-9 col-md-9 contact-content">
					<div class="row">
						<div class="col-lg-9 col-md-8">
							<?php if( get_theme_mod('vw_construction_estate_contact_title') != ''){ ?>
					    		<h2 class="subtitle"><?php echo esc_html(get_theme_mod('vw_construction_estate_contact_title','')); ?></h2>
					    	<?php }?>
					    	<?php if( get_theme_mod('vw_construction_estate_contact_content') != ''){ ?>
					    		<p class="subtitle"><?php echo esc_html(get_theme_mod('vw_construction_estate_contact_content','')); ?></p>
					    	<?php }?>
					    </div>
					    <div class="col-lg-3 col-md-4">
					    	<?php if( get_theme_mod('vw_construction_estate_contact_text') != ''){ ?>
						    	<div class ="contact-btn">
						          	<a href="<?php echo esc_url(get_theme_mod('vw_construction_estate_contact_link','')); ?>"><span><?php echo esc_html(get_theme_mod('vw_construction_estate_contact_text','')); ?></span>
					          		<i class="<?php echo esc_attr(get_theme_mod('vw_construction_estate_contact_text_icon','fas fa-arrow-right')); ?>"></i>
						          	<span class="screen-reader-text"><?php esc_html_e( 'CONTACT NOW','vw-construction-estate' );?></span></a>
						        </div>
					        <?php }?>
					    </div>
					</div>
				</div>
			</div>
		</section>
	<?php }?>

	<?php do_action( 'vw_construction_estate_below_consultant' ); ?>

	<?php /*--About Us--*/?>
	<?php if( get_theme_mod('vw_construction_estate_about_setting') != ''){ ?>
		<section class="about-section">
		  	<div class="container-fluid">
		    	<?php
		      	$vw_construction_estate_postData1=  get_theme_mod('vw_construction_estate_about_setting');
		        if($vw_construction_estate_postData1){
		        $args = array( 'name' => esc_html($vw_construction_estate_postData1 ,'vw-construction-estate'));
		      	$query = new WP_Query( $args );
		      	if ( $query->have_posts() ) :
		        	while ( $query->have_posts() ) : $query->the_post(); ?>
		        	<div class="row">
			        	<div class="abt-image col-lg-4 col-md-4">
			          		<?php the_post_thumbnail(); ?>
			          	</div>
			          	<div class="col-lg-8 col-md-8 content-sec">
			            	<h3><?php the_title(); ?></h3>
			            	<p><?php $excerpt = get_the_excerpt(); echo esc_html( vw_construction_estate_string_limit_words( $excerpt, esc_attr(get_theme_mod('vw_construction_estate_about_excerpt_number','30')))); ?></p>
			            	<?php if( get_theme_mod('vw_construction_estate_about_button_text','DISCOVER MORE') != ''){ ?>
				            	<div class ="about-btn">
				              		<a href="<?php echo esc_url(get_permalink()); ?>"><span><?php echo esc_html(get_theme_mod('vw_construction_estate_about_button_text',__('DISCOVER MORE','vw-construction-estate')));?></span><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('vw_construction_estate_about_button_text',__('DISCOVER MORE','vw-construction-estate')));?></span></a>
				            	</div>
				            <?php } ?>
			          	</div>  
		          	</div>        	
		        <?php endwhile; 
		        wp_reset_postdata();?>
		        <?php else : ?>
		          <div class="no-postfound"></div>
		        <?php
		    	endif; }?>
		  	</div>
		</section>
	<?php }?>

	<?php do_action( 'vw_construction_estate_below_about' ); ?>

	<div class="container">
		<?php while ( have_posts() ) : the_post(); ?>
			<?php the_content(); ?>
		<?php endwhile; // end of the loop. ?>
	</div>
</main>

<?php get_footer(); ?>