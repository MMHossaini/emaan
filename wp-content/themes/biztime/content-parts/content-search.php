 <?php
/**
 *  For Search Results
 */
?>
<div class="single-blog">
	<?php if(has_post_thumbnail()) : ?>
	<div class="blog-image">
		<a class="image-scale" href="<?php the_permalink(); ?>">
			<?php the_post_thumbnail('biztime-page-thumbnail'); ?>
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
			<a class="blog-btn" href="<?php the_permalink(); ?>"><?php echo esc_html__('Read More', 'biztime'); ?></a>
		</div>
	</div>
</div>