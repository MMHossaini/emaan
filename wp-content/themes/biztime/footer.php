 <?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Biztime
 */
$biztime_footer_section = get_theme_mod('biztime_footer_section_hideshow','show');
if ($biztime_footer_section =='show') { 
?>	
	<!-- Start Footer bottom Area -->
	<footer>
		<div class="footer-area footer-area-2">
			<div class="container">
				<div class="row">
					<div class="col-md-3 col-sm-6 col-xs-12">
						<div class="footer-content">
							<div class="footer-head">
								<?php dynamic_sidebar('biztime-footer-widget-area-1'); ?>  
							</div>
						</div>
					</div>
					<!-- end single footer -->
					<div class="col-md-3 col-sm-6 col-xs-12">
						<div class="footer-content">
							<div class="footer-head">
								<?php dynamic_sidebar('biztime-footer-widget-area-2'); ?>  
							</div>
						</div>
					</div>
					<!-- end single footer -->
					<div class="col-md-3 col-sm-6 col-xs-12">
						<div class="footer-content">
							<div class="footer-head">
								<?php dynamic_sidebar('biztime-footer-widget-area-3'); ?>  
							</div>
						</div>
					</div>
					<!-- end single footer -->
					<div class="col-md-3 col-sm-6 col-xs-12">
						<div class="footer-content">
							<div class="footer-head">
								<?php dynamic_sidebar('biztime-footer-widget-area-4'); ?>  
							</div>
						</div>
					</div>
					<!-- end single footer -->
											
				</div>
			</div>
		</div>
		<!-- End footer area -->
		<div class="footer-area-bottom footer-area-bottom-2">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="copyright">
							<?php if( get_theme_mod('biztime-footer_title') ) : ?>
							<p><?php echo wp_kses_post( html_entity_decode(get_theme_mod('biztime-footer_title'))); ?></p>
							<?php else : ?> 
							<p>
							<?php 
							   /* translators: 1: poweredby, 2: link, 3: span tag closed  */
							   printf( esc_html__( ' %1$sPowered by %2$s%3$s', 'biztime' ), '<span>', '<a href="'. esc_url( __( 'https://wordpress.org/', 'biztime' ) ) .'" target="_blank">WordPress.</a>', '</span>' );
							   /* translators: 1: poweredby, 2: link, 3: span tag closed  */
							   printf( esc_html__( ' Theme: Biztime by: %1$sDesign By %2$s%3$s', 'biztime' ), '<span>', '<a href="'. esc_url( __( 'http://themeskey.com/', 'biztime' ) ) .'" target="_blank">themeskey.</a>', '</span>' );
							?>
							</p>
							<?php endif;  ?>								
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
	
       
    <?php } ?>
   
    <?php wp_footer(); ?>
</body>
</html>