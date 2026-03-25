<?php
/**
 * VW Construction Estate: Block Patterns
 *
 * @package VW Construction Estate
 * @since   1.0.0
 */

/**
 * Register Block Pattern Category.
 */
if ( function_exists( 'register_block_pattern_category' ) ) {

	register_block_pattern_category(
		'vw-construction-estate',
		array( 'label' => __( 'VW Construction Estate', 'vw-construction-estate' ) )
	);
}

/**
 * Register Block Patterns.
 */
if ( function_exists( 'register_block_pattern' ) ) {
	register_block_pattern(
		'vw-construction-estate/banner-section',
		array(
			'title'      => __( 'Banner Section', 'vw-construction-estate' ),
			'categories' => array( 'vw-construction-estate' ),
			'content'    => "<!-- wp:cover {\"url\":\"" . esc_url( get_template_directory_uri() ). "/inc/block-patterns/images/slider.png\",\"id\":3000,\"dimRatio\":80,\"customGradient\":\"linear-gradient(125deg,rgba(24,22,22,0.23) 22%,rgb(10,0,63) 49%)\",\"align\":\"full\",\"className\":\"sliderbox\"} -->\n<div class=\"wp-block-cover alignfull has-background-dim-80 has-background-dim has-background-gradient sliderbox\" style=\"background-image:url(" . esc_url( get_template_directory_uri() ) . "/inc/block-patterns/images/slider.png)\"><span aria-hidden=\"true\" class=\"wp-block-cover__gradient-background\" style=\"background:linear-gradient(125deg,rgba(24,22,22,0.23) 22%,rgb(10,0,63) 49%)\"></span><div class=\"wp-block-cover__inner-container\"><!-- wp:columns {\"align\":\"wide\",\"className\":\"mx-md-5 px-md-5 mx-0\"} -->\n<div class=\"wp-block-columns alignwide mx-md-5 px-md-5 mx-0\"><!-- wp:column -->\n<div class=\"wp-block-column\"></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"verticalAlignment\":\"top\",\"width\":\"42%\",\"className\":\"sliderbox-content mx-md-5 mx-0\"} -->\n<div class=\"wp-block-column is-vertically-aligned-top sliderbox-content mx-md-5 mx-0\" style=\"flex-basis:42%\"><!-- wp:heading {\"textAlign\":\"right\",\"level\":1,\"className\":\"mb-2\",\"textColor\":\"white\",\"style\":{\"typography\":{\"fontSize\":40}}} -->\n<h1 class=\"has-text-align-right mb-2 has-white-color has-text-color\" style=\"font-size:40px\"><strong>LOREM IPSUM IS SIMPLY DUMMY TEXT OF THE PRINTING </strong></h1>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"align\":\"right\",\"className\":\"text-right\",\"style\":{\"typography\":{\"fontSize\":15}}} -->\n<p class=\"has-text-align-right text-right\" style=\"font-size:15px\">Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the  </p>\n<!-- /wp:paragraph -->\n\n<!-- wp:buttons {\"align\":\"right\"} -->\n<div class=\"wp-block-buttons alignright\"><!-- wp:button {\"borderRadius\":0,\"textColor\":\"white\"} -->\n<div class=\"wp-block-button\"><a class=\"wp-block-button__link has-white-color has-text-color no-border-radius\"><strong>DISCOVER MORE</strong></a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div></div>\n<!-- /wp:cover -->",
		)
	);

	register_block_pattern(
		'vw-construction-estate/contact-section',
		array(
			'title'      => __( 'Contact Section', 'vw-construction-estate' ),
			'categories' => array( 'vw-construction-estate' ),
			'content'    => "<!-- wp:columns {\"align\":\"full\",\"className\":\"contactbox mb-0\"} -->\n<div class=\"wp-block-columns alignfull contactbox mb-0\"><!-- wp:column {\"width\":\"28%\",\"className\":\"call-box-col mx-lg-5 mx-3\"} -->\n<div class=\"wp-block-column call-box-col mx-lg-5 mx-3\" style=\"flex-basis:28%\"><!-- wp:columns {\"verticalAlignment\":\"top\",\"className\":\"callbox py-4\"} -->\n<div class=\"wp-block-columns are-vertically-aligned-top callbox py-4\"><!-- wp:column {\"verticalAlignment\":\"top\",\"width\":\"29%\",\"className\":\"phone-col\"} -->\n<div class=\"wp-block-column is-vertically-aligned-top phone-col\" style=\"flex-basis:29%\"><!-- wp:image {\"id\":2994,\"sizeSlug\":\"large\",\"linkDestination\":\"none\"} -->\n<figure class=\"wp-block-image size-large\"><img src=\"" . esc_url( get_template_directory_uri() ) . "/inc/block-patterns/images/call.png\" alt=\"\" class=\"wp-image-2994\"/></figure>\n<!-- /wp:image --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"verticalAlignment\":\"top\",\"width\":\"110%\",\"className\":\"call-text-call ms-2\"} -->\n<div class=\"wp-block-column is-vertically-aligned-top call-text-call ms-2\" style=\"flex-basis:110%\"><!-- wp:paragraph {\"className\":\"m-0\",\"style\":{\"typography\":{\"fontSize\":28},\"color\":{\"text\":\"#0a003f\"}}} -->\n<p class=\"m-0 has-text-color\" style=\"color:#0a003f;font-size:28px\"><strong>+00-123-456-789</strong></p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"width\":\"100%\",\"className\":\"contact-content-col\"} -->\n<div class=\"wp-block-column contact-content-col\" style=\"flex-basis:100%\"><!-- wp:cover {\"customOverlayColor\":\"#f68121\",\"minHeight\":50,\"align\":\"center\",\"className\":\"px-lg-5\"} -->\n<div class=\"wp-block-cover aligncenter has-background-dim px-lg-5\" style=\"background-color:#f68121;min-height:50px\"><div class=\"wp-block-cover__inner-container\"><!-- wp:columns {\"className\":\"mb-0\"} -->\n<div class=\"wp-block-columns mb-0\"><!-- wp:column {\"width\":\"80%\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:80%\"><!-- wp:heading {\"textAlign\":\"left\",\"className\":\"mb-0\",\"style\":{\"typography\":{\"fontSize\":28}}} -->\n<h2 class=\"has-text-align-left mb-0\" style=\"font-size:28px\"><strong>LOREM IPSUM&nbsp;IS SIMPLY DUMMY TEXT OF</strong> &nbsp;</h2>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"align\":\"left\",\"className\":\"text-left mb-md-0 mb-4\",\"style\":{\"typography\":{\"fontSize\":14}}} -->\n<p class=\"has-text-align-left text-left mb-md-0 mb-4\" style=\"font-size:14px\">Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem </p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"verticalAlignment\":\"center\",\"width\":\"33.33%\"} -->\n<div class=\"wp-block-column is-vertically-aligned-center\" style=\"flex-basis:33.33%\"><!-- wp:buttons -->\n<div class=\"wp-block-buttons\"><!-- wp:button {\"borderRadius\":0,\"textColor\":\"white\"} -->\n<div class=\"wp-block-button\"><a class=\"wp-block-button__link has-white-color has-text-color no-border-radius\"><strong>CONTACT US NOW</strong></a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div></div>\n<!-- /wp:cover --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns -->",
		)
	);

	register_block_pattern(
		'vw-construction-estate/about-section',
		array(
			'title'      => __( 'About Section', 'vw-construction-estate' ),
			'categories' => array( 'vw-construction-estate' ),
			'content'    => "<!-- wp:columns {\"align\":\"full\",\"className\":\"main-about\"} -->\n<div class=\"wp-block-columns alignfull main-about\"><!-- wp:column {\"verticalAlignment\":\"top\",\"width\":\"33.33%\",\"className\":\"main-about-img mt-0\"} -->\n<div class=\"wp-block-column is-vertically-aligned-top main-about-img mt-0\" style=\"flex-basis:33.33%\"><!-- wp:image {\"align\":\"center\",\"id\":3007,\"sizeSlug\":\"large\",\"linkDestination\":\"none\"} -->\n<div class=\"wp-block-image\"><figure class=\"aligncenter size-large\"><img src=\"" . esc_url(get_template_directory_uri()) . "/inc/block-patterns/images/about.png\" alt=\"\" class=\"wp-image-3007\"/></figure></div>\n<!-- /wp:image --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"width\":\"66.66%\",\"className\":\"main-about-content mx-2 mt-4\"} -->\n<div class=\"wp-block-column main-about-content mx-2 mt-4\" style=\"flex-basis:66.66%\"><!-- wp:heading {\"textAlign\":\"left\",\"level\":3,\"className\":\"mb-4\",\"style\":{\"color\":{\"text\":\"#0a003f\"},\"typography\":{\"fontSize\":28}}} -->\n<h3 class=\"has-text-align-left mb-4 has-text-color\" style=\"color:#0a003f;font-size:28px\"><strong>WELCOME TO OUR COMPANY</strong></h3>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"className\":\"text-left mb-4\",\"style\":{\"typography\":{\"fontSize\":14},\"color\":{\"text\":\"#5b5b5b\"}}} -->\n<p class=\"text-left mb-4 has-text-color\" style=\"color:#5b5b5b;font-size:14px\">Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:buttons -->\n<div class=\"wp-block-buttons\"><!-- wp:button {\"borderRadius\":0} -->\n<div class=\"wp-block-button\"><a class=\"wp-block-button__link no-border-radius\"><strong>DISCOVER MORE</strong></a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns -->",
		)
	);
}