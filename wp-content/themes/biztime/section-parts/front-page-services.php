<?php
/**
 * Template part - Service Section of FrontPage
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Biztime
 */
  $biztime_services_title = get_theme_mod('biztime-services_title');
  $biztime_services_subtitle = get_theme_mod('biztime-services_subtitle');
  $biztime_services_section     = get_theme_mod( 'biztime_services_section_hideshow','hide');
  
   
  $biztime_service_no_excerpt = get_theme_mod('biztime_service_no_excerpt');
 
  $services_no        = 6;
  $services_pages      = array();
  $services_icons     = array();
  for( $i = 1; $i <= $services_no; $i++ ) {
    $services_pages[]    =  get_theme_mod( "biztime_service_page_$i", 1 );
    $services_icons[]    = get_theme_mod( "biztime_page_service_icon_$i", '' );
  }

  $services_args  = array(
      'post_type' => 'page',
      'post__in' => array_map( 'absint', $services_pages ),
      'posts_per_page' => absint($services_no),
      'orderby' => 'post__in'
     
  ); 
    
  $services_query = new   wp_Query( $services_args );
  if( $biztime_services_section == "show" && $services_query->have_posts() ) {
  ?>
 
	<!-- Start Service area -->
	<div class="services-area area-padding">
		<div class="container">
			<?php if($biztime_services_title || $biztime_services_subtitle)   {  ?>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="section-headline text-center">
							<h3><?php echo esc_html($biztime_services_title); ?></h3>
							<p><?php echo esc_html($biztime_services_subtitle); ?></p>
						</div>
					</div>
				</div>
			<?php } ?>
			<div class="row">
				<div class="services-all services-2">
					<?php
					$count = 0;
					while($services_query->have_posts()) :
					$services_query->the_post();
					?>
						<!-- Start services -->
						<div class="col-md-<?php echo esc_attr(get_theme_mod('biztime_services_section_layout','4')); ?> col-sm-6 col-xs-12">
						   <div class="single-services">
								<?php if(has_post_thumbnail()) : ?>	
									<a class="service-images" href="<?php the_permalink() ?>">
										<?php the_post_thumbnail('biztime-project-thumbnail'); ?>
									</a>
								<?php endif; ?>
								<div class="service-content">
									<h4><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h4>
									<?php the_excerpt(); ?>
									<a class="read-more" href="<?php the_permalink() ?>"><?php echo esc_html__('Read more','biztime'); ?></a>
								</div>
							</div>
						</div>
					<?php
					$count = $count + 1;
					endwhile;
					wp_reset_postdata();
					?> 
				</div>
			</div>
		</div>
	</div>
	
<?php
  }
?>