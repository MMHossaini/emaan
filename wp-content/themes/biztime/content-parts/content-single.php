
<!-- single-blog start -->
<article id="post-<?php the_ID(); ?>" <?php post_class('blog-post-wrapper'); ?>>
	<div class="blog-banner">
		 <?php if(has_post_thumbnail()) : ?>
		   <?php the_post_thumbnail(); ?>
		<?php endif; ?>
		<div class="blog-content">
			<div class="blog-meta <?php if(has_post_thumbnail()) : ?> blog-meta-below <?php endif; ?>">
				<span class="date-type">
					<?php the_time( get_option( 'date_format' ) ); ?>
				</span>
			</div>
			<h4><?php the_title(); ?></h4>
			<div class="blog-inner-content">
				<?php the_content(); 
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'biztime' ),
					'after'  => '</div>',
				) );
				?>
			</div>
			<?php if (has_tag()) : ?>
				<span class="post-tags">
					<i class="fa fa-share-square-o"></i>
					 <?php echo esc_html__(' ', 'biztime' ); ?><?php the_tags('&nbsp;'); ?>
				</span>			
			<?php endif; ?>	
		</div>
	</div>
</article>