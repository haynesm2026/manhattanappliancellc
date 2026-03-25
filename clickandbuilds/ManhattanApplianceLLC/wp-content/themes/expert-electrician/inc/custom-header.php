<?php
/**
 * Custom header implementation
 */

function expert_electrician_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'expert_electrician_custom_header_args', array(
		'default-text-color'     => 'fff',
		'header-text' 			 =>	false,
		'width'                  => 1200,
		'height'                 => 220,
		'wp-head-callback'       => 'expert_electrician_header_style',
	) ) );
}

add_action( 'after_setup_theme', 'expert_electrician_custom_header_setup' );

if ( ! function_exists( 'expert_electrician_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see expert_electrician_custom_header_setup().
 */
add_action( 'wp_enqueue_scripts', 'expert_electrician_header_style' );
function expert_electrician_header_style() {
	//Check if user has defined any header image.
	if ( get_header_image() ) :
	$custom_css = "
        .page-template-custom-home-page #header, #header {
			background-image:url('".esc_url(get_header_image())."');
			background-size: 100% 100%;
		}";
	   	wp_add_inline_style( 'expert-electrician-basic-style', $custom_css );
	endif;
}
endif; // expert_electrician_header_style