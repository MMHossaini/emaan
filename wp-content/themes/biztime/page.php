<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
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
								<span> <?php the_title(); ?></span>
							</h1>
						</div>						
					</div>
				</div>
			</div>
		</div>
	</div>
    
	<div class="page-head area-padding">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-sm-8 col-xs-12">
					<div class="page-detail">
						<?php 
						if(have_posts()) : 
							while(have_posts()) : the_post(); 
								if(has_post_thumbnail()) : 
									the_post_thumbnail('', array('class' => 'page-thumbnail')); 
								endif; 
								the_content();                               
								wp_link_pages( array(
									'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'biztime' ),
									'after'  => '</div>',
								) );
							endwhile;
						else :  
							get_template_part( 'content-parts/content', 'none' );
						endif; 
						if ( comments_open() || get_comments_number() ) :
								comments_template();
						endif; 
						?> 
						<!--End Comments -->
					</div>
				</div>
				<div class="col-md-4 col-sm-4 col-xs-12">
					<div class="left-head-blog">
						 <?php get_sidebar(); ?>
					</div>
				</div>
				<!-- End left sidebar -->
			</div>
		</div>
	</div>		
<?php get_footer(); ?>