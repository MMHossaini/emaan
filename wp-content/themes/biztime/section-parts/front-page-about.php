<?php
/**
 * Template part - About Us Section of FrontPage
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package biztime
 */
 
$enable_about  = get_theme_mod( 'biztime_about_section_hideshow','hide');
   
$about_no        = 1;
$about_pages      = array();
for( $i = 1; $i <= $about_no; $i++ ) {
	$about_pages[]    =  get_theme_mod( "biztime_about_page_$i", 1 );
}
$about_args  = array(
	'post_type' => 'page',
	'post__in' => array_map( 'absint', $about_pages ),
	'posts_per_page' => absint($about_no),
	'orderby' => 'post__in'
   
); 

$about_query = new   wp_Query( $about_args );

if( $enable_about == "show" && $about_query->have_posts() ) :
?>


	<!-- about-area start -->
	<div class="about-area bg-color area-padding">
		<div class="container">
			<div class="row">
				<?php
				while($about_query->have_posts()) :
				$about_query->the_post();				
				?>
					<div class="<?php if(has_post_thumbnail()) { ?> col-md-6 col-sm-6 <?php } else { ?> col-md-12 col-sm-12 <?php } ?> col-xs-12">
						<div class="about-content">
							<h4><?php the_title(); ?></h4>
							<?php the_content(); ?>		
						</div>
					</div>
					<?php if(has_post_thumbnail()) : ?>	
						<div class="col-md-6 col-sm-6 col-xs-12">
							<div class="about-image">
								<?php the_post_thumbnail(''); ?>
							</div>
						</div>				
					<?php endif; ?>
					<!-- column end -->
				<?php 
				endwhile;
				wp_reset_postdata();
				?>		
			</div>
		</div>
	</div>
	<!-- about-area end -->

<?php endif; ?>