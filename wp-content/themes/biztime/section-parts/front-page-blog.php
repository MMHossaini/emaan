<?php 
// To display Blog Post section on front page

$biztime_blog_section = get_theme_mod('biztime_blog_section_hideshow','show');
$biztime_blog_btntext = get_theme_mod('biztime_blog_btntext','View All News');

if ($biztime_blog_section =='show') { 
?>
	<!--Blog Area Start-->
	<div class="blog-area area-padding">
		<div class="container">
			<?php if(get_theme_mod('biztime_blog_title') || get_theme_mod('biztime_blog_subtitle')) : ?>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="section-headline text-center">
						<h3><?php echo esc_html(get_theme_mod('biztime_blog_title')); ?></h3>
						<p><?php echo esc_html(get_theme_mod('biztime_blog_subtitle')); ?></p>
					</div>
				</div>
			</div>
			<?php endif; ?>
			<div class="row">
				<div class="blog-grid home-blog">
					<?php 
					$latest_blog_posts = new WP_Query( array( 'posts_per_page' => 3 ) );
					if ( $latest_blog_posts->have_posts() ) : 
						while ( $latest_blog_posts->have_posts() ) : $latest_blog_posts->the_post(); 
						?>						
							<!-- Start single blog -->
							<div class="col-md-4 col-sm-6 col-xs-12">
								<div class="single-blog">
									<?php if(has_post_thumbnail()) : ?>
										<div class="blog-image">
											<a class="image-scale" href="<?php the_permalink(); ?>">
												<?php the_post_thumbnail('biztime-project-thumbnail'); ?>
											</a>
										</div>
									<?php endif; ?>
									<div class="blog-content">
									   <div class="blog-title">
										   <div class="blog-meta <?php if(has_post_thumbnail()) : ?> blog-meta-below <?php endif; ?>">
												<span class="date-type">
													<?php the_time( get_option( 'date_format' ) ); ?>
												</span>
											</div>
											<a href="<?php the_permalink(); ?>">
												<h4><?php the_title(); ?></h4>
											</a>
										</div>
										<div class="blog-text">
											<?php the_excerpt(); ?>
											<a class="blog-btn" href="<?php the_permalink(); ?>"><?php echo esc_html__('Read more','biztime'); ?></a>
										</div>
									</div>
								</div>
							</div>
							<!-- End single blog --> 
						<?php 
						endwhile; 
					endif; 
					?>									
				</div>
			</div>
			<?php if(get_theme_mod('biztime_blog_btnurl')) : ?>
				<div class="row">
					<div class="col-md-12 text-center">
						<a class="banner-btn blog-more-btn" href="<?php echo esc_url(get_theme_mod('biztime_blog_btnurl')); ?>"><?php echo esc_html($biztime_blog_btntext); ?></a>
					</div>				
				</div>
			<?php  endif; ?>
			<!-- End row -->
		</div>
	</div>
	<!--End of Blog Area-->	
<?php } ?>