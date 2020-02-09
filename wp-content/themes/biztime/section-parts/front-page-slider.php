<?php
/**
 * Template part - Features Section of FrontPage
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package Biztime
*/
    $biztime_slider_section     = get_theme_mod( 'biztime_slider_section_hideshow','hide');
    
    $slider_no        = 3;
    $slider_pages      = array();
    for( $i = 1; $i <= $slider_no; $i++ ) {
        $slider_pages[]    =  get_theme_mod( "biztime_slider_page_$i", 1 );
        $biztime_slider_btntxt[]    =  get_theme_mod( "biztime_slider_btntxt_$i", 1 );
        $biztime_slider_btnurl[]    =  get_theme_mod( "biztime_slider_btnurl_$i", 1 );
		$biztime_slider_btntxt2[]    =  get_theme_mod( "biztime_slider_btntxt2_$i", 1 );
        $biztime_slider_btnurl2[]    =  get_theme_mod( "biztime_slider_btnurl2_$i", 1 );
         
	}
    
	$slider_args  = array(
        'post_type' => 'page',
        'post__in' => array_map( 'absint', $slider_pages ),
        'posts_per_page' => absint($slider_no),
        'orderby' => 'post__in'
	   
    ); 
	
    $slider_query = new   wp_Query( $slider_args );

    if ($biztime_slider_section =='show' && $slider_query->have_posts() ) { ?>
        
		<!-- Start Slider Area -->
        <div class="intro-area intro-area-2">
           <div class="main-overly"></div>
            <div class="intro-carousel">  
				<?php
				$count = 0;
				while($slider_query->have_posts()) :
				$slider_query->the_post();
				?>	
					<div class="intro-content">
						<div class="slider-images">
							<?php the_post_thumbnail('full'); ?>							
						</div>
						<div class="slider-content">
							<div class="display-table">
								<div class="display-table-cell">
									<div class="container">
										<div class="row">
											<div class="col-md-12 text-center">
											   <div class="layer-1-1 ">
													<?php the_content(); ?>
												</div>
												<!-- layer 1 -->
												<div class="layer-1-2">
													<h1 class="title2"><?php the_title(); ?></h1>
												</div>
												<!-- layer 3 -->
												<div class="layer-1-3">
												<?php if($biztime_slider_btnurl[$count]): ?><a href="<?php echo esc_url($biztime_slider_btnurl[$count]); ?>" class="ready-btn left-btn" ><?php echo esc_html($biztime_slider_btntxt[$count]); ?></a> <?php endif; ?>
												<?php if($biztime_slider_btnur2[$count]): ?><a href="<?php echo esc_url($biztime_slider_btnurl2[$count]); ?>" class="ready-btn right-btn" ><?php echo esc_html($biztime_slider_btntxt2[$count]); ?></a> <?php endif; ?>
												
												</div>
											</div>
										</div>
									</div>
								</div>
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
        <!-- End Slider Area -->		
			
<?php }else{ ?>

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
<?php } ?>