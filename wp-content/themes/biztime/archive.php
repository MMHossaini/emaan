<?php 
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Biztime
*/
get_header(); ?>   
        
	<!-- Start breadcumb Area -->
	<div class="page-area" <?php if ( get_header_image() ){ ?> style="background-image:url('<?php header_image(); ?>')"  <?php } ?>>
		<div class="breadcumb-overlay <?php if ( !(get_header_image()) ){ ?> breadcumb-overlay-color <?php } ?>"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="breadcrumb text-center">
						<div class="section-headline white-headline text-center">
							<h1> 							
								<span> <?php echo the_archive_title(); ?></span>
							</h1>
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
											<?php get_template_part('content-parts/content', get_post_format()); ?>
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