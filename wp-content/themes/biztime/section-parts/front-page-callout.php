<?php 
// To display Footer Call Out section on front page
?>
<?php
$biztime_contact_section_hideshow = get_theme_mod('biztime_contact_section_hideshow','hide');
if ($biztime_contact_section_hideshow =='show') { 
	$ctah_btn_text = get_theme_mod('ctah_btn_text'); 
	$ctah_contact_number = get_theme_mod('ctah_contact_number'); 
	?> 
	<!-- Start Banner Area -->
	<div class="banner-area parallax-bg area-padding " <?php if(get_header_image()) { ?> style="url(<?php header_image(); ?>) no-repeat scroll center center / cover; " <?php } ?>>
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="banner-content text-center">
						<h2><?php echo esc_html(get_theme_mod('ctah_heading')); ?></h2>
						<div class="banner-contact">
							<?php if($ctah_contact_number) : ?>
								<span class="call-us"><i class="fa fa-phone"></i><?php echo esc_html($ctah_contact_number); ?> </span>
							<?php endif; ?>
							<?php if(get_theme_mod('ctah_btn_url')){ ?>
								<span><?php echo esc_html__('or','biztime'); ?></span>
								<a class="banner-btn" href="<?php echo esc_url(get_theme_mod('ctah_btn_url')); ?>"><?php echo esc_html($ctah_btn_text); ?></a>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Banner Area -->
<?php } ?> 