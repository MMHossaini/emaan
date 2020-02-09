<?php 
/**
 * The header for our theme.
 *
 * Displays all of the <head> section 
 *
 * @package Biztime
 */
 ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="x-ua-compatible" content="ie=edge">		
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
</head> 
  
<body <?php body_class(); ?>>
	<div id="preloader"></div>
	 <header class="header-two <?php if ( !(get_header_image()) ){ ?> header-color <?php } ?>">
			<?php  
			$biztime_header_section_hideshow = get_theme_mod('biztime_header_section_hideshow','hide');
			$biztime_phone_value = get_theme_mod('biztime_header_phone_value');  
			$biztime_email_value = get_theme_mod('biztime_header_email_value');
			$biztime_header_social_link_1 = get_theme_mod('biztime_header_social_link_1');
			$biztime_header_social_link_2 = get_theme_mod('biztime_header_social_link_2');
			$biztime_header_social_link_3 = get_theme_mod('biztime_header_social_link_3');
			$biztime_header_social_link_4 = get_theme_mod('biztime_header_social_link_4');
			$biztime_header_social_link_5 = get_theme_mod('biztime_header_social_link_5');
			$biztime_header_quote_btn_text = get_theme_mod('biztime_header_quote_btn_text');
            $biztime_header_quote_btn_url = get_theme_mod('biztime_header_quote_btn_url');
            $biztime_search_icon_hideshow = get_theme_mod('biztime_search_icon_hideshow','show');
			if($biztime_phone_value || $biztime_email_value){
				$class1 = '6';
				$class2 = '';
			}else{
				$class1 = '12';
				$class2 = 'pull-left';
			}
            
			if($biztime_header_section_hideshow=='show'){
			?>
				<!-- Start top bar -->
				<div class="topbar-area topbar-area-2 fix hidden-xs">
					<div class="container">
						<div class="row">
							<?php if($biztime_phone_value || $biztime_email_value): ?>
								<div class="col-md-6 col-sm-6">
									<div class="topbar-left">
										<ul>
											<?php if($biztime_email_value) : ?><li><i class="fa fa-envelope"></i> <?php echo esc_html($biztime_email_value); ?></li><?php endif; ?>
											<?php if($biztime_phone_value) : ?><li><i class="fa fa-phone"></i> <?php echo esc_html($biztime_phone_value); ?></li><?php endif; ?>
										</ul>  
									</div>
								</div>
							<?php endif; ?>
							<div class="col-md-<?php echo esc_attr($class1); ?> col-sm-6">
								<?php if($biztime_header_quote_btn_url) : ?>
									<div class="quote-button">
										<a href="<?php echo esc_url($biztime_header_quote_btn_url); ?>" class="quote-btn" ><?php echo esc_html($biztime_header_quote_btn_text); ?></a>
									</div>
								<?php endif; ?>
								<div class="top-social <?php echo esc_attr($class2); ?>">
									<ul>
										<?php if($biztime_header_social_link_1) : ?><li><a href="<?php echo esc_url($biztime_header_social_link_1); ?>"><i class="fa fa-facebook"></i></a></li><?php endif; ?>
										<?php if($biztime_header_social_link_2) : ?><li><a href="<?php echo esc_url($biztime_header_social_link_2); ?>"><i class="fa fa-twitter"></i></a></li><?php endif; ?>
										<?php if($biztime_header_social_link_3) : ?><li><a href="<?php echo esc_url($biztime_header_social_link_3); ?>"><i class="fa fa-linkedin"></i></a></li><?php endif; ?>
										<?php if($biztime_header_social_link_4) : ?><li><a href="<?php echo esc_url($biztime_header_social_link_4); ?>"><i class="fa fa-instagram"></i></a></li><?php endif; ?>
										<?php if($biztime_header_social_link_5) : ?><li><a href="<?php echo esc_url($biztime_header_social_link_5); ?>"><i class="fa fa-youtube-play"></i></a></li><?php endif; ?>					
									</ul> 
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- End top bar -->
			<?php } ?>	
            <!-- header-area start -->
            <div id="sticker" class="header-area header-area-2 hidden-xs">
                <div class="container">
                    <div class="row">
                        <!-- logo start -->
                        <div class="col-md-3 col-sm-3">
                            <div class="logo">
								<?php the_custom_logo(); ?>
								<?php  if ( display_header_text() ) : ?>
									<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="<?php if (has_custom_logo()) : ?> pt-5 <?php endif ?>">
										<span class="site-title"><?php bloginfo( 'title' ); ?></span>
										<span class="site-description"><?php bloginfo( 'description' ); ?></span>
									</a>                       
								<?php endif; ?>	
                            </div>
                        </div>		
						
                        <!-- logo end -->
                        <div class="col-md-9 col-sm-9">
                            <?php if($biztime_search_icon_hideshow=='show'): ?>
								<div class="header-right-link">                                
									<div class="search-option">
										<?php get_search_form(); ?>
									</div>
									<a class="main-search" href="#search"><i class="fa fa-search"></i></a>
									<!-- search option end -->
								</div>
							<?php endif; ?>	
                            <!-- mainmenu start -->
                            <nav class="navbar navbar-default">
                                <div class="collapse navbar-collapse" id="navbar-example">
                                    <div class="main-menu">
                                        
										<?php wp_nav_menu( array
											(
											'menu'              => 'primary',
											'container'        => 'ul', 
											'theme_location'    => 'primary', 
											'menu_class'        => 'menu', 
											'items_wrap'        => '<ul class="nav navbar-nav navbar-right">%3$s</ul>',
											'fallback_cb'       => 'biztime_wp_bootstrap_navwalker::fallback',
											'walker'            => new biztime_wp_bootstrap_navwalker()
											)); 
										?> 
										
                                    </div>
                                </div>
                            </nav>
                            <!-- mainmenu end -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- header-area end -->
            <!-- mobile-menu-area start -->
            <div class="mobile-menu-area hidden-lg hidden-md hidden-sm">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mobile-menu">
                                <div class="logo">
                                    <?php the_custom_logo(); ?>
                                </div>
                                <nav id="dropdown">
                                    <?php wp_nav_menu( array
											(
											'menu'              => 'primary',
											'container'        => 'ul', 
											'theme_location'    => 'primary', 
											'menu_class'        => 'menu', 
											'items_wrap'        => '<ul>%3$s</ul>',
											'fallback_cb'       => 'biztime_wp_bootstrap_navwalker::fallback',
											'walker'            => new biztime_wp_bootstrap_navwalker()
											)); 
										?> 
                                </nav>
                            </div>					
                        </div>
                    </div>
                </div>
            </div>
            <!-- mobile-menu-area end -->		
        </header>