<?php
/**
 * Template part - Features Section of FrontPage
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package biztime
 */
  $biztime_features_title = get_theme_mod('biztime-features_title');
  $biztime_features_subtitle = get_theme_mod('biztime-features_subtitle');
  $biztime_features_section     = get_theme_mod( 'biztime_features_section_hideshow','hide');
  
   
  $biztime_service_no_excerpt = get_theme_mod('biztime_service_no_excerpt');
 
  $features_no        = 6;
  $features_pages      = array();
  $features_icons     = array();
  for( $i = 1; $i <= $features_no; $i++ ) {
    $features_pages[]    =  get_theme_mod( "biztime_features_page_$i", 1 );
    $features_icons[]    = get_theme_mod( "biztime_page_features_icon_$i", '' );
  }

  $features_args  = array(
      'post_type' => 'page',
      'post__in' => array_map( 'absint', $features_pages ),
      'posts_per_page' => absint($features_no),
      'orderby' => 'post__in'
     
  ); 
    
  $features_query = new   wp_Query( $features_args );
  if( $biztime_features_section == "show" && $features_query->have_posts() ) :
  ?>
	<!-- Welcome service area start -->
	<div class="welcome-area area-padding">
		<div class="container">
			<?php if($biztime_features_title  || $biztime_features_subtitle) {  ?>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="section-headline text-center">
							<h4><?php echo esc_html($biztime_features_title); ?></h4>
							<p><?php echo esc_html($biztime_features_subtitle); ?></p>
						</div>
					</div>
				</div>
			<?php } ?>
			<div class="row">
				<?php
				$count = 0;
				while($features_query->have_posts()) :
					$features_query->the_post();
					?>
					<div class="col-md-<?php echo esc_attr(get_theme_mod('biztime_features_section_layout','3')); ?> col-sm-6 col-xs-12">
						<div class="well-services text-center">
							<div class="well-icon">
								<a href="<?php the_permalink() ?>"><i class="fa <?php echo esc_html($features_icons[$count]); ?>" ></i></a>
							</div>
							<div class="well-content">
								<h4><?php the_title(); ?></h4>
								<?php the_excerpt(); ?>
							</div>
						</div>
					</div>
					<!-- single-well end-->
					<?php
					$count = $count + 1;
				endwhile;
				wp_reset_postdata();
				?>  		
			</div>
		</div>
	</div>
	<!-- Welcome service area End -->

<?php
  endif;
?>