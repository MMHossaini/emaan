<?php
/**
 * Biztime Theme Customizer
 *
 * @package Biztime
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */


function biztime_customize_register( $wp_customize ) {	
	 
	// Biztime theme choice options
	if (!function_exists('biztime_section_choice_option')) :
		function biztime_section_choice_option()
		{
			$biztime_section_choice_option = array(
				'show' => esc_html__('Show', 'biztime'),
				'hide' => esc_html__('Hide', 'biztime')
			);
			return apply_filters('biztime_section_choice_option', $biztime_section_choice_option);
		}
	endif;
	
	// Biztime theme layout choice options
	if (!function_exists('biztime_section_layout_choice_option')) :
		function biztime_section_layout_choice_option()
		{
			$biztime_section_layout_choice_option = array(
				'6' => esc_html__('2 Column', 'biztime'),
				'4' => esc_html__('3 Column', 'biztime'),
				'3' => esc_html__('4 Column', 'biztime')
			);
			return apply_filters('biztime_section_layout_choice_option', $biztime_section_layout_choice_option);
		}
	endif;
	
	/**
	 * Sanitizing the select callback example
	 *
	 */
	if ( !function_exists('biztime_sanitize_select') ) :
		function biztime_sanitize_select( $input, $setting ) {

			// Ensure input is a slug.
			$input = sanitize_text_field( $input );

			// Get list of choices from the control associated with the setting.
			$choices = $setting->manager->get_control( $setting->id )->choices;

			// If the input is a valid key, return it; otherwise, return the default.
			return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
		}
	endif;

	/**
	 * Drop-down Pages sanitization callback example.
	 *
	 * - Sanitization: dropdown-pages
	 * - Control: dropdown-pages
	 * 
	 * Sanitization callback for 'dropdown-pages' type controls. This callback sanitizes `$page_id`
	 * as an absolute integer, and then validates that $input is the ID of a published page.
	 * 
	 * @see absint() https://developer.wordpress.org/reference/functions/absint/
	 * @see get_post_status() https://developer.wordpress.org/reference/functions/get_post_status/
	 *
	 * @param int                  $page    Page ID.
	 * @param WP_Customize_Setting $setting Setting instance.
	 * @return int|string Page ID if the page is published; otherwise, the setting default.
	 */
	function biztime_sanitize_dropdown_pages( $page_id, $setting ) {
		// Ensure $input is an absolute integer.
		$page_id = absint( $page_id );
		
		// If $page_id is an ID of a published page, return it; otherwise, return the default.
		return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
	}
	
	
	/** Front Page Section Settings starts **/	

	$wp_customize->add_panel(
		'frontpage', 
		array(
			'title' => esc_html__('Biztime Options', 'biztime'),        
			'description' => '',                                        
			'priority' => 3,
		)
	);
	
	/** Slider Section Settings starts **/
   

	// Panel - Slider Section 1
    $wp_customize->add_section('sliderinfo', array(
      'title'   => esc_html__('Home Slider Section', 'biztime'),
      'description' => '',
	  'panel' => 'frontpage',
      'priority'    => 140
    ));

	// hide show
	
	 $wp_customize->add_setting(
     'biztime_slider_section_hideshow',
    array(
        'default' => 'hide',
        'sanitize_callback' => 'biztime_sanitize_select',
    )
    );
	 
    $biztime_section_choice_option = biztime_section_choice_option();
    $wp_customize->add_control(
    'biztime_slider_section_hideshow',
    array(
        'type' => 'radio',
        'label' => esc_html__('Slider Option', 'biztime'),
        'description' => esc_html__('Show/hide option for Slider Section.', 'biztime'),
        'section' => 'sliderinfo',
        'choices' => $biztime_section_choice_option,
        'priority' => 1
    )
    );
  
    $slider_no = 3;
	for( $i = 1; $i <= $slider_no; $i++ ) {
		$biztime_slider_page = 'biztime_slider_page_' .$i;
		$biztime_slider_btntxt = 'biztime_slider_btntxt_' . $i;
		$biztime_slider_btnurl = 'biztime_slider_btnurl_' .$i;
		$biztime_slider_btntxt2 = 'biztime_slider_btntxt2_' .$i;
		$biztime_slider_btnurl2 = 'biztime_slider_btnurl2_' .$i;
		 

		$wp_customize->add_setting( $biztime_slider_page,
			array(
				'default'           => 1,
				'sanitize_callback' => 'biztime_sanitize_dropdown_pages',
			)
		);

		$wp_customize->add_control( $biztime_slider_page,
			array(
				'label'    			=> esc_html__( 'Slider Page ', 'biztime' ) .$i,
				'section'  			=> 'sliderinfo',
				'type'     			=> 'dropdown-pages',
				'priority' 			=> 100,
			)
		);

		$wp_customize->add_setting( $biztime_slider_btntxt,
			array(
				'default'           => '',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control( $biztime_slider_btntxt,
			array(
				'label'    			=> esc_html__( 'Slider Button Text','biztime' ),
				'section'  			=> 'sliderinfo',
				'type'     			=> 'text',
				'priority' 			=> 100,
			)
		);
		
		$wp_customize->add_setting( $biztime_slider_btnurl,
			array(
				'default'           => '',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control( $biztime_slider_btnurl,
			array(
				'label'    			=> esc_html__( 'Button URL', 'biztime' ),
				'section'  			=> 'sliderinfo',
				'type'     			=> 'text',
				'priority' 			=> 100,
			)
		);
		
		
		$wp_customize->add_setting( $biztime_slider_btntxt2,
			array(
				'default'           => '',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control( $biztime_slider_btntxt2,
			array(
				'label'    			=> esc_html__( 'Slider Button 2 Text','biztime' ),
				'section'  			=> 'sliderinfo',
				'type'     			=> 'text',
				'priority' 			=> 100,
			)
		);
		
		$wp_customize->add_setting( $biztime_slider_btnurl2,
			array(
				'default'           => '',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control( $biztime_slider_btnurl2,
			array(
				'label'    			=> esc_html__( 'Button 2 URL', 'biztime' ),
				'section'  			=> 'sliderinfo',
				'type'     			=> 'text',
				'priority' 			=> 100,
			)
		);
    }
	/** Slider Section Settings end **/
	
	// Header info
	$wp_customize->add_section(
		'biztime_header_section', 
		array(
			'title'   => esc_html__('Top Header Section', 'biztime'),
			'description' => '',
			'panel' => 'frontpage',
			'priority'    => 130
		)
	);

	$wp_customize->add_setting(
		'biztime_header_section_hideshow',
		array(
			'default' => 'show',
			'sanitize_callback' => 'biztime_sanitize_select',
		)
	);
	
	$biztime_section_choice_option = biztime_section_choice_option();
	$wp_customize->add_control(
		'biztime_header_section_hideshow',
		array(
			'type' => 'radio',
			'label' => esc_html__('Header Info Option', 'biztime'),
			'description' => esc_html__('Show/hide option for Header Section.', 'biztime'),
			'section' => 'biztime_header_section',
			'choices' => $biztime_section_choice_option,
			'priority' => 1
		)
	);

	$wp_customize->add_setting(
		'biztime_header_phone_value', 
		array(
			'default'   => '',
			'type'      => 'theme_mod',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);

	$wp_customize->add_control(
		'biztime_header_phone_value', 
		array(
			'label'   => esc_html__('Contact Number', 'biztime'),
			'section' => 'biztime_header_section',
			'priority'  => 3
		)
	);

	$wp_customize->add_setting(
		'biztime_header_email_value', 
		array(
			'default'   => '',
			'type'      => 'theme_mod',
			'sanitize_callback'	=> 'sanitize_text_field'
		)
	);

	$wp_customize->add_control(
		'biztime_header_email_value',
		array(
			'label'   => esc_html__('Email', 'biztime'),
			'section' => 'biztime_header_section',
			'priority'  => 5
		)
	);
	
	$wp_customize->add_setting(
		'biztime_header_social_link_1',
		array(
			'default'   =>  '',
			'type'      => 'theme_mod',
			'sanitize_callback' => 'esc_url_raw'
		)
	);

	$wp_customize->add_control(
		'biztime_header_social_link_1',
		array(
			'label'   => esc_html__('Facebook URL', 'biztime'),
			'section' => 'biztime_header_section',
			'priority'  => 7
		)
	);

	$wp_customize->add_setting(
		'biztime_header_social_link_2',
		array(
			'default'   => '',
			'type'      => 'theme_mod',
			'sanitize_callback' => 'esc_url_raw'
		)
	);

	$wp_customize->add_control(
		'biztime_header_social_link_2',
		array(
			'label'   => esc_html__('Twitter URL', 'biztime'),
			'section' => 'biztime_header_section',
			'priority'  => 9
		)
	);

	$wp_customize->add_setting(
		'biztime_header_social_link_3',
		array(
			'default'   => '',
			'type'      => 'theme_mod',
			'sanitize_callback' => 'esc_url_raw'
		)
	);

	$wp_customize->add_control(
		'biztime_header_social_link_3',
		array(
			'label'   => esc_html__('Linkedin URL', 'biztime'),
			'section' => 'biztime_header_section',
			'priority'  => 11
		)
	);

	$wp_customize->add_setting(
		'biztime_header_social_link_4',
		array(
			'default'   => '',
			'type'      => 'theme_mod',
			'sanitize_callback' => 'esc_url_raw'
		)
	);

	$wp_customize->add_control(
		'biztime_header_social_link_4',
		array(
			'label'   => esc_html__('Instagram URL', 'biztime'),
			'section' => 'biztime_header_section',
			'priority'  => 11
		)
	);
	$wp_customize->add_setting(
		'biztime_header_social_link_5',
		array(
			'default'   => '',
			'type'      => 'theme_mod',
			'sanitize_callback' => 'esc_url_raw'
		)
	);

	$wp_customize->add_control(
		'biztime_header_social_link_5',
		array(
			'label'   => esc_html__('Yotube URL', 'biztime'),
			'section' => 'biztime_header_section',
			'priority'  => 13
		)
	);
	
	$wp_customize->add_setting(
		'biztime_header_quote_btn_text',
		array(
			'default'   => '',
			'type'      => 'theme_mod',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);

	$wp_customize->add_control(
		'biztime_header_quote_btn_text',
		array(
			'label'   => esc_html__('Get Quote Button Text', 'biztime'),
			'section' => 'biztime_header_section',
			'priority'  => 15
		)
	);
	$wp_customize->add_setting(
		'biztime_header_quote_btn_url',
		array(
			'default'   => '',
			'type'      => 'theme_mod',
			'sanitize_callback' => 'esc_url_raw'
		)
	);

	$wp_customize->add_control(
		'biztime_header_quote_btn_url',
		array(
			'label'   => esc_html__('Get Quote Button URL', 'biztime'),
			'section' => 'biztime_header_section',
			'priority'  => 17
		)
	);
	
	$wp_customize->add_setting(
		'biztime_search_icon_hideshow',
		array(
			'default' => 'show',
			'sanitize_callback' => 'biztime_sanitize_select',
		)
	);
	
	$biztime_section_choice_option = biztime_section_choice_option();
	$wp_customize->add_control(
		'biztime_search_icon_hideshow',
		array(
			'type' => 'radio',
			'label' => esc_html__('Display Search Icon', 'biztime'),
			'description' => esc_html__('Do you want to display serach icon on menu', 'biztime'),
			'section' => 'biztime_header_section',
			'choices' => $biztime_section_choice_option,
			'priority' => 19
		)
	);
	
	
	//  About section
	$wp_customize->add_section(
		'about',              
		array(
			'title' => esc_html__('Home About Section', 'biztime'),          
			'description' => '',             
			'panel' => 'frontpage',		 
			'priority' => 150,
		)
	);
	
	$wp_customize->add_setting(
		'biztime_about_section_hideshow',
		array(
			'default' => 'hide',
			'sanitize_callback' => 'biztime_sanitize_select',
		)
    );
    
    $biztime_section_choice_option = biztime_section_choice_option();
    $wp_customize->add_control(
		'biztime_about_section_hideshow',
		array(
			'type' => 'radio',
			'label' => esc_html__('About Section Option', 'biztime'),
			'description' => esc_html__('Show/hide option Section.', 'biztime'),
			'section' => 'about',
			'choices' => $biztime_section_choice_option,
			'priority' => 1
		)
    );	
   
	$about_no = 1;
	for( $i = 1; $i <= $about_no; $i++ ) {
		$biztime_about_page = 'biztime_about_page_' . $i;	
		$wp_customize->add_setting( 
			$biztime_about_page,
			array(
				'default'           => 1,
				'sanitize_callback' => 'biztime_sanitize_dropdown_pages',
			)
		);

		$wp_customize->add_control( $biztime_about_page,
			array(
				'label'    			=> esc_html__( 'About Page ', 'biztime' ).$i,
				'section'  			=> 'about',
				'type'     			=> 'dropdown-pages',
				'priority' 			=> 4,
			)
		);
	
	}
	
	//  Features section
	$wp_customize->add_section(
		'features',              
		array(
			'title' => esc_html__('Home Feature Section', 'biztime'),          
			'description' => '',             
			'panel' => 'frontpage',		 
			'priority' => 150,
		)
	);
	
	$wp_customize->add_setting(
		'biztime_features_section_hideshow',
		array(
			'default' => 'hide',
			'sanitize_callback' => 'biztime_sanitize_select',
		)
    );
    
    $biztime_section_choice_option = biztime_section_choice_option();
    $wp_customize->add_control(
		'biztime_features_section_hideshow',
		array(
			'type' => 'radio',
			'label' => esc_html__('Features Option', 'biztime'),
			'description' => esc_html__('Show/hide option Section.', 'biztime'),
			'section' => 'features',
			'choices' => $biztime_section_choice_option,
			'priority' => 1
		)
    );	
   $wp_customize->add_setting(
		'biztime_features_section_layout',
		array(
			'default' => '3',
			'sanitize_callback' => 'biztime_sanitize_select',
		)
    );
    
    $biztime_section_layout_choice_option = biztime_section_layout_choice_option();
    $wp_customize->add_control(
		'biztime_features_section_layout',
		array(
			'type' => 'radio',
			'label' => esc_html__('Features Column Layout', 'biztime'),
			'description' => esc_html__('Select Column Layout For Features', 'biztime'),
			'section' => 'features',
			'choices' => $biztime_section_layout_choice_option,
			'priority' => 1
		)
    );	
   
    $wp_customize->add_setting(
		'biztime-features_title',
		array(
			'default'   => '',
			'type'      => 'theme_mod',
			'sanitize_callback'	=> 'sanitize_text_field'
		)
	);

    $wp_customize->add_control(
		'biztime-features_title',
		array(
			'label'   => esc_html__('Features Section Title', 'biztime'),
			'section' => 'features',
			'priority'  => 3
		)
	);
	
	$wp_customize->add_setting(
		'biztime-features_subtitle',
		array(
			'default'   => '',
			'type'      => 'theme_mod',
			'sanitize_callback'	=> 'sanitize_text_field'
		)
	);

    $wp_customize->add_control(
		'biztime-features_subtitle',
		array(
			'label'   => esc_html__('Features Section Subtitle', 'biztime'),
			'section' => 'features',	  
			'priority'  => 4
		)
	);

    $features_no = 4;
	for( $i = 1; $i <= $features_no; $i++ ) {
		$biztime_featurespage = 'biztime_features_page_' . $i;
		$biztime_featuresicon = 'biztime_page_features_icon_' . $i;
		
		// Setting - Feature Icon
		$wp_customize->add_setting( 
			$biztime_featuresicon,
			array(
				'default'           => '',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control( 
			$biztime_featuresicon,
			array(
				'label'    			=> esc_html__( 'Features Icon ', 'biztime' ).$i,
				'description' 		=>  __('Select a icon in this list <a target="_blank" href="https://fontawesome.com/v4.7.0/icons/">Font Awesome icons</a> and enter the class name','biztime'),
				'section'  			=> 'features',
				'type'     			=> 'text',
				'priority' 			=> 100,
			)
		);
		
		$wp_customize->add_setting( 
			$biztime_featurespage,
			array(
				'default'           => 1,
				'sanitize_callback' => 'biztime_sanitize_dropdown_pages',
			)
		);

		$wp_customize->add_control( 
			$biztime_featurespage,
			array(
				'label'    			=> esc_html__( 'Features Page ', 'biztime' ) .$i,
				'section'  			=> 'features',
				'type'     			=> 'dropdown-pages',
				'priority' 			=> 100,
			)
		);
    }
	
	
	//  Services section
	$wp_customize->add_section(
		'services',              
		array(
			'title' => esc_html__('Home Service Section', 'biztime'),          
			'description' => '',             
			'panel' => 'frontpage',		 
			'priority' => 150,
		)
	);
	
	$wp_customize->add_setting(
		'biztime_services_section_hideshow',
		array(
			'default' => 'hide',
			'sanitize_callback' => 'biztime_sanitize_select',
		)
    );
    
    $biztime_section_choice_option = biztime_section_choice_option();
    $wp_customize->add_control(
		'biztime_services_section_hideshow',
		array(
			'type' => 'radio',
			'label' => esc_html__('Services Option', 'biztime'),
			'description' => esc_html__('Show/hide option Section.', 'biztime'),
			'section' => 'services',
			'choices' => $biztime_section_choice_option,
			'priority' => 1
		)
    );
	
   $wp_customize->add_setting(
		'biztime_services_section_layout',
		array(
			'default' => '4',
			'sanitize_callback' => 'biztime_sanitize_select',
		)
    );
    
    $biztime_section_layout_choice_option = biztime_section_layout_choice_option();
    $wp_customize->add_control(
		'biztime_services_section_layout',
		array(
			'type' => 'radio',
			'label' => esc_html__('Services Section layout', 'biztime'),
			'description' => esc_html__('Select Column layout for Services', 'biztime'),
			'section' => 'services',
			'choices' => $biztime_section_layout_choice_option,
			'priority' => 1
		)
    );	
   
    $wp_customize->add_setting(
		'biztime-services_title',
		array(
			'default'   => '',
			'type'      => 'theme_mod',
			'sanitize_callback'	=> 'sanitize_text_field'
		)
	);

    $wp_customize->add_control(
		'biztime-services_title',
		array(
			'label'   => esc_html__('Services Section Title', 'biztime'),
			'section' => 'services',
			'priority'  => 3
		)
	);
	
	$wp_customize->add_setting(
		'biztime-services_subtitle',
		array(
			'default'   => '',
			'type'      => 'theme_mod',
			'sanitize_callback'	=> 'sanitize_text_field'
		)
	);

    $wp_customize->add_control(
		'biztime-services_subtitle',
		array(
			'label'   => esc_html__('Service Section Subtitle', 'biztime'),
			'section' => 'services',	  
			'priority'  => 4
		)
	);

    $service_no = 6;
	for( $i = 1; $i <= $service_no; $i++ ) {
		$biztime_servicepage = 'biztime_service_page_' . $i;		
		
		$wp_customize->add_setting( 
			$biztime_servicepage,
			array(
				'default'           => 1,
				'sanitize_callback' => 'biztime_sanitize_dropdown_pages',
			)
		);

		$wp_customize->add_control( 
			$biztime_servicepage,
			array(
				'label'    			=> esc_html__( 'Service Page ', 'biztime' ) .$i,
				'section'  			=> 'services',
				'type'     			=> 'dropdown-pages',
				'priority' 			=> 100,
			)
		);
    }
	
	//callout
	$wp_customize->add_section(
		'biztime_footer_contact', 
		array(
			'title'   => esc_html__('Home Callout Section', 'biztime'),
			'description' => '',
			'panel' => 'frontpage',
			'priority'    => 170
		)
	);
	
	$wp_customize->add_setting(
		'biztime_contact_section_hideshow',
		array(
			'default' => 'hide',
			'sanitize_callback' => 'biztime_sanitize_select',
		)
	);

	$biztime_section_choice_option = biztime_section_choice_option();
	$wp_customize->add_control(
		'biztime_contact_section_hideshow',
		array(
			'type' => 'radio',
			'label' => esc_html__('Footer Callout', 'biztime'),
			'description' => esc_html__('Show/hide option for Footer Callout Section.', 'biztime'),
			'section' => 'biztime_footer_contact',
			'choices' => $biztime_section_choice_option,
			'priority' => 5
		)
	);
	


	$wp_customize->add_setting(
		'ctah_heading', 
		array(
			'default'   => '',
			'type'      => 'theme_mod',
			'sanitize_callback'	=> 'sanitize_text_field'
		)
	);

	$wp_customize->add_control(
		'ctah_heading', 
		array(
			'label'   => esc_html__('Callout Text', 'biztime'),
			'section' => 'biztime_footer_contact',
			'priority'  => 8
		)
	);
	$wp_customize->add_setting(
		'ctah_contact_number', 
		array(
			'default'   => '',
			'type'      => 'theme_mod',
			'sanitize_callback'	=> 'sanitize_text_field'
		)
	);

	$wp_customize->add_control(
		'ctah_contact_number', 
		array(
			'label'   => esc_html__('Callout Contact Number', 'biztime'),
			'section' => 'biztime_footer_contact',			
		)
	);

	$wp_customize->add_setting(
		'ctah_btn_url', 
		array(
			'default'   =>'',
			'type'      => 'theme_mod',
			'sanitize_callback'	=> 'esc_url_raw'
		)
	);

	$wp_customize->add_control(
		'ctah_btn_url', 
		array(
			'label'   => esc_html__('Button URL', 'biztime'),
			'section' => 'biztime_footer_contact',
			'priority'  => 10
		)
	);

	$wp_customize->add_setting(
		'ctah_btn_text', 
		array(
			'default'   => '',
			'type'      => 'theme_mod',
			'sanitize_callback'	=> 'sanitize_text_field'
		)
	);

	$wp_customize->add_control(
		'ctah_btn_text', 
		array(
			'label'   => esc_html__('Button Text', 'biztime'),
			'section' => 'biztime_footer_contact',
			'priority'  => 12
		)
	);
	

	
	

	// Blog section
	$wp_customize->add_section(
		'biztime-blog_info',
		array(
			'title'   => esc_html__('Home Blog Section', 'biztime'),
			'description' => '',
			'panel' => 'frontpage',
			'priority'    => 170
		)
	);
	
	$wp_customize->add_setting(
		'biztime_blog_section_hideshow',
		array(
			'default' => 'show',
			'sanitize_callback' => 'biztime_sanitize_select',
		)
	);
    
    $biztime_section_choice_option = biztime_section_choice_option();
    $wp_customize->add_control(
		'biztime_blog_section_hideshow',
		array(
			'type' => 'radio',
			'label' => esc_html__('Blog Option', 'biztime'),
			'description' => esc_html__('Show/hide option for Blog Section.', 'biztime'),
			'section' => 'biztime-blog_info',
			'choices' => $biztime_section_choice_option,
			'priority' => 1
		)
    );
	
	$wp_customize->add_setting(
		'biztime_blog_title',
		array(
			'default'   => '',
			'type'      => 'theme_mod',
			'sanitize_callback'	=> 'sanitize_text_field'
		)
	);

	$wp_customize->add_control(
		'biztime_blog_title',
		array(
			'label'   => esc_html__('Blog Section Title', 'biztime'),
			'section' => 'biztime-blog_info',
			'priority'  => 1
		)
	);
	
	$wp_customize->add_setting(
		'biztime_blog_subtitle',
		array(
			'default'   => '',
			'type'      => 'theme_mod',
			'sanitize_callback'	=> 'sanitize_text_field'
		)
	);

    $wp_customize->add_control(
		'biztime_blog_subtitle',
		array(
			'label'   => esc_html__('Blog Section Subtitle', 'biztime'),
			'section' => 'biztime-blog_info',
			
		)
	);

    $wp_customize->add_setting( 
		'biztime_blog_btnurl',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control( 
		'biztime_blog_btnurl',
        array(
            'label'             => esc_html__( 'View More Button URL', 'biztime' ),
            'section'           => 'biztime-blog_info',
            'type'              => 'text',
            'priority'          => 100,
        )
    );
	
	$wp_customize->add_setting(
		'biztime_blog_btntext',
		array(
			'default'   => '',
			'type'      => 'theme_mod',
			'sanitize_callback'	=> 'sanitize_text_field'
		)
	);

	$wp_customize->add_control(
		'biztime_blog_btntext',
		array(
			'label'   => esc_html__('View More Button Text', 'biztime'),
			'section' => 'biztime-blog_info',			
		)
	);
	

	// Footer Section
	
	$wp_customize->add_section(
		'biztime-footer_info',
		array(
			'title'   => esc_html__('Footer Section', 'biztime'),
			'description' => '',
			'panel' => 'frontpage',
			'priority'    => 170
		)
	);

	$wp_customize->add_setting(
		'biztime_footer_section_hideshow',
		array(
			'default' => 'show',
			'sanitize_callback' => 'biztime_sanitize_select',
		)
	);
	$biztime_section_choice_option = biztime_section_choice_option();
	$wp_customize->add_control(
		'biztime_footer_section_hideshow',
		array(
			'type' => 'radio',
			'label' => esc_html__('Footer Option', 'biztime'),
			'description' => esc_html__('Show/hide option for Footer Section.', 'biztime'),
			'section' => 'biztime-footer_info',
			'choices' => $biztime_section_choice_option,
			'priority' => 1
		)
	);

	$wp_customize->add_setting(
		'biztime-footer_title',
		array(
			'default'   => '',
			'type'      => 'theme_mod',
			'sanitize_callback'	=> 'wp_kses_post'
		)
	);

	$wp_customize->add_control(
		'biztime-footer_title',
		array(
			'label'   => esc_html__('Copyright', 'biztime'),
			'section' => 'biztime-footer_info',
			'type'      => 'textarea',
			'priority'  => 1
		)
	);
   
  	
/** Front Page Section Settings end **/	

}
add_action( 'customize_register', 'biztime_customize_register' );
