<?php
/**
 * The template for displaying all single posts.
 *
 * @package Biztime
 */
 get_header(); ?>

	<!-- Start breadcumb Area -->
	<div class="page-area" <?php if ( get_header_image() ){ ?> style="background-image:url('<?php header_image(); ?>')"  <?php } ?>>
		<div class="breadcumb-overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="breadcrumb text-center">
						<div class="section-headline white-headline text-center">
							<h1> 
								<span><?php wp_title(''); ?></span>
							</h1>
						</div>                            
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--Blog Area Start-->
	<!--Blog Area Start-->
	<div class="blog-page-area area-padding">
		<div class="container">
			<div class="row">
				<div class="blog-details">
					<!-- Start single blog -->
					<div class="col-md-8 col-sm-8 col-xs-12">
						<?php if(have_posts()) : ?>
                            <?php while(have_posts()) : the_post(); ?>
                                <?php  get_template_part( 'content-parts/content', 'single' ); ?>
                            <?php endwhile; ?>
                        <?php else :  
                            get_template_part( 'content-parts/content', 'none' );
                        endif; ?>
						
						
						<div class="clear"></div>
						<div class="single-post-comments">
							<?php 
                            if ( comments_open() || get_comments_number() ) :
                                    comments_template();
                            endif; 
							?> 						
						</div>
						<!-- single-blog end -->
					</div>
				</div>
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