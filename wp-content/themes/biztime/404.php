<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package biztime
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
							<h1> 							
								<span> <?php echo wp_title(''); ?></span>
							</h1>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<!-- End breadcumb Area -->
	<div class="page-head area-padding">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="row">
						<div class="error-page">
							<!-- map area -->
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="error-main-text text-center">
									<h1 class="high-text"><?php echo esc_html__( '404', 'biztime' ); ?></h1>
									<h3 class="error-bot"><?php echo esc_html__( 'Oops, the page you are looking for does not exit.', 'biztime' ); ?></h3>
									<a  class="error-btn" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html__( 'Back Homepage', 'biztime' ); ?></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
<?php get_footer(); ?>	