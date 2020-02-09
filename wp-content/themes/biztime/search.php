<?php
/**
 * The template for displaying search results pages.
 *
 * @package Biztime
 */
get_header();
?>
	<!-- Start breadcumb Area -->
	<div class="page-area" <?php if ( get_header_image() ){ ?> style="background-image:url('<?php header_image(); ?>')"  <?php } ?>>
		<div class="breadcumb-overlay <?php if ( !(get_header_image()) ){ ?> breadcumb-overlay-color <?php } ?>"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="breadcrumb text-center">
						<div class="section-headline white-headline text-center">
							<?php if ( have_posts() ) : ?>
							<h1> 							
								<span>
								<?php 
									/* translators: %s: search term */
									printf( esc_html__( 'Search Results for: %s', 'biztime' ), '<p>' . get_search_query() . '</p>' ); ?>
								</span>
							</h1>
							<?php else : ?>
							<h1>
								<span>	
									<?php
									/* translators: %s: nothing found term */
									printf( esc_html__( 'Nothing Found for: %s', 'biztime' ), '<p>' . get_search_query() . '</p>' ); ?>
								</span>
							</h1>
							<?php endif; ?>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>
   
	<!--Blog Area Start-->
	<div class="blog-page-area area-padding">
		<div class="container">
			<div class="row">
				<!-- Start single blog -->
				<div class="col-md-8 col-sm-8 col-xs-12">
					<div class="blog-grid home-blog">
						<div class="row">
							<?php if(have_posts()) : ?>
								<?php while(have_posts()) : the_post(); ?>
									<div class="col-md-12 col-sm-12 col-xs-12">
										<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
											<?php get_template_part('content-parts/content', 'search'); ?>
										</div>
									</div>
								<?php endwhile; ?>
							
								<div class="col-md-12 col-sm-12 col-xs-12">
									<div class="blog-pagination">
										<?php the_posts_pagination(
										array(
										  'prev_text' =>esc_html__('<','biztime'),
										  'next_text' =>esc_html__('>','biztime')
										)
										); ?>
									</div>
							   </div>
							   <?php else :  
									get_template_part( 'content-parts/content', 'none' );
								endif; ?>
						</div>
					</div>
				</div>
				<!-- End single blog -->
				<!-- End main column -->
				<div class="col-md-4 col-sm-4 col-xs-12">
					<div class="left-head-blog">
						 <?php get_sidebar(); ?>
					</div>
				</div>
				<!-- End left sidebar -->
			</div>
			<!-- End row -->
		</div>
	</div>
	<!--End of Blog Area-->

<?php get_footer(); ?>