<?php 
/**
 * Template Name: Home Page
 * @package Biztime
*/

get_header();
get_template_part( 'section-parts/front-page-slider' );
get_template_part( 'section-parts/front-page-features');
get_template_part( 'section-parts/front-page-about');
get_template_part( 'section-parts/front-page-services' );
get_template_part( 'section-parts/front-page-thecontent');
get_template_part( 'section-parts/front-page-callout' );
get_template_part( 'section-parts/front-page-blog' );
get_footer(); 
?>