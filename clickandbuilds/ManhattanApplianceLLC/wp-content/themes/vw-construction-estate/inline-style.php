<?php
	
	/*---------------------------First highlight color-------------------*/

	$vw_construction_estate_first_color = get_theme_mod('vw_construction_estate_first_color');

	$vw_construction_estate_custom_css = '';

	if($vw_construction_estate_first_color != false){
		$vw_construction_estate_custom_css .='#header .socialicons, .menu-searh, .slider .carousel-control-prev-icon i, .slider .carousel-control-next-icon i, .contact-btn a, .about-btn a, .footer, .sidebar input[type="submit"], .footer input[type="submit"], .footer-2, .scrollup i, .sidebar h3, .read_full a, h1.entry-title, h1.page-title, .sidebar td#today, .footer a.custom_read_more, .sidebar a.custom_read_more, .pagination span, .pagination a, .nav-previous a, .nav-next a, .woocommerce nav.woocommerce-pagination ul li a, .page-content .read-moresec a.button:hover{';
			$vw_construction_estate_custom_css .='background-color: '.esc_attr($vw_construction_estate_first_color).';';
		$vw_construction_estate_custom_css .='}';
	}
	if($vw_construction_estate_first_color != false){
		$vw_construction_estate_custom_css .='p.diff-lay, .contact-no span a, .contact-btn a:hover, .about-section h3, .sidebar th, .sidebar td, nav.woocommerce-MyAccount-navigation ul li a:hover, .logo .site-title a:hover{';
			$vw_construction_estate_custom_css .='color: '.esc_attr($vw_construction_estate_first_color).';';
		$vw_construction_estate_custom_css .='}';
	}
	if($vw_construction_estate_first_color != false){
		$vw_construction_estate_custom_css .='.contact-btn a{';
			$vw_construction_estate_custom_css .='border-color: '.esc_attr($vw_construction_estate_first_color).'!important;';
		$vw_construction_estate_custom_css .='}';
	}
	if($vw_construction_estate_first_color != false){
		$vw_construction_estate_custom_css .='.sidebar h3:after{';
			$vw_construction_estate_custom_css .='border-top-color: '.esc_attr($vw_construction_estate_first_color).'!important;';
		$vw_construction_estate_custom_css .='}';
	}

	/*---------------------------Second highlight color-------------------*/

	$vw_construction_estate_second_color = get_theme_mod('vw_construction_estate_second_color');

	if($vw_construction_estate_second_color != false){
		$vw_construction_estate_custom_css .='.slider .more-btn a:hover, .contact-btn a:hover, .about-btn a:hover, .woocommerce span.onsale, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .read_full a:hover, nav.woocommerce-MyAccount-navigation ul li, .entry-audio audio, .pagination .current, .pagination a:hover, #header .custom-social-icons i:hover, a.button, .footer .tagcloud a:hover, .sidebar .tagcloud a:hover, input[type="submit"], #comments a.comment-reply-link, .toggle-nav i, .sidebar .widget_price_filter .ui-slider .ui-slider-range, .sidebar .widget_price_filter .ui-slider .ui-slider-handle, .sidebar .woocommerce-product-search button, .footer .widget_price_filter .ui-slider .ui-slider-range, .footer .widget_price_filter .ui-slider .ui-slider-handle, .footer .woocommerce-product-search button, .sidebar a.custom_read_more:hover, .footer a.custom_read_more:hover, .footer .custom-social-icons i:hover, .sidebar .custom-social-icons i:hover, .nav-previous a:hover, .nav-next a:hover, .woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li span.current, #preloader{';
			$vw_construction_estate_custom_css .='background-color: '.esc_attr($vw_construction_estate_second_color).';';
		$vw_construction_estate_custom_css .='}';
	}
	if($vw_construction_estate_second_color != false){
		$vw_construction_estate_custom_css .='#comments input[type="submit"].submit{';
			$vw_construction_estate_custom_css .='background-color: '.esc_attr($vw_construction_estate_second_color).'!important;';
		$vw_construction_estate_custom_css .='}';
	}
	if($vw_construction_estate_second_color != false){
		$vw_construction_estate_custom_css .='a, .logo h1 a, .logo p, .top-header i, .contact-no i, .footer h3, .footer .custom-social-icons i, .sidebar .custom-social-icons i, .scrollup i, .postbox:hover h4 a, .postbox:hover i, .post-navigation a:hover .post-title, .post-navigation a:focus .post-title, .sidebar td#prev a, .entry-content a, .main-navigation a:hover, .main-navigation ul.sub-menu a:hover, .entry-content a, .sidebar .textwidget p a, .textwidget p a, #comments p a, .slider .inner_carousel p a, .logo p.site-title a, .footer a.custom_read_more, .sidebar ul li a:hover, .footer li a:hover, .postbox:hover h2 a, .postbox:hover .metabox a, .metabox:hover a, p.same-lay a:hover, .contact-no span a:hover, .copyright a:hover, .slider .inner_carousel h1 a:hover{';
			$vw_construction_estate_custom_css .='color: '.esc_attr($vw_construction_estate_second_color).';';
		$vw_construction_estate_custom_css .='}';
	}
	if($vw_construction_estate_second_color != false){
		$vw_construction_estate_custom_css .='.slider .more-btn a:hover, .contact-btn a:hover, .scrollup i, input[type="submit"], .footer a.custom_read_more, .footer .custom-social-icons i, .sidebar .custom-social-icons i, .footer .custom-social-icons i:hover, .sidebar .custom-social-icons i:hover{';
			$vw_construction_estate_custom_css .='border-color: '.esc_attr($vw_construction_estate_second_color).';';
		$vw_construction_estate_custom_css .='}';
	}
	if($vw_construction_estate_second_color != false){
		$vw_construction_estate_custom_css .='.footer-2, hr.big, .main-navigation ul ul{';
			$vw_construction_estate_custom_css .='border-top-color: '.esc_attr($vw_construction_estate_second_color).';';
		$vw_construction_estate_custom_css .='}';
	}
	if($vw_construction_estate_second_color != false){
		$vw_construction_estate_custom_css .='.footer h3, .main-navigation ul ul{';
			$vw_construction_estate_custom_css .='border-bottom-color: '.esc_attr($vw_construction_estate_second_color).';';
		$vw_construction_estate_custom_css .='}';
	}
	if($vw_construction_estate_second_color != false){
		$vw_construction_estate_custom_css .='.slider .inner_carousel h1{';
			$vw_construction_estate_custom_css .='border-right-color: '.esc_attr($vw_construction_estate_second_color).';';
		$vw_construction_estate_custom_css .='}';
	}
	if($vw_construction_estate_second_color != false){
		$vw_construction_estate_custom_css .='.about-section h3{';
			$vw_construction_estate_custom_css .='border-left-color: '.esc_attr($vw_construction_estate_second_color).';';
		$vw_construction_estate_custom_css .='}';
	}
	if($vw_construction_estate_second_color != false){
		$vw_construction_estate_custom_css .='#contact{
		background: rgba(0, 0, 0, 0)linear-gradient(90deg, #fff 25%,'.esc_attr($vw_construction_estate_second_color).' 25%) repeat scroll 0 0;
		}';
	}
	/*---------------------------Width Layout -------------------*/

	$vw_construction_estate_theme_lay = get_theme_mod( 'vw_construction_estate_width_option','Full Width');
    if($vw_construction_estate_theme_lay == 'Boxed'){
		$vw_construction_estate_custom_css .='body{';
			$vw_construction_estate_custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$vw_construction_estate_custom_css .='}';
		$vw_construction_estate_custom_css .='.scrollup i{';
			$vw_construction_estate_custom_css .='right: 100px;';
		$vw_construction_estate_custom_css .='}';
		$vw_construction_estate_custom_css .='.scrollup.left i{';
			$vw_construction_estate_custom_css .='left: 100px;';
		$vw_construction_estate_custom_css .='}';
	}else if($vw_construction_estate_theme_lay == 'Wide Width'){
		$vw_construction_estate_custom_css .='body{';
			$vw_construction_estate_custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$vw_construction_estate_custom_css .='}';
		$vw_construction_estate_custom_css .='.scrollup i{';
			$vw_construction_estate_custom_css .='right: 30px;';
		$vw_construction_estate_custom_css .='}';
		$vw_construction_estate_custom_css .='.scrollup.left i{';
			$vw_construction_estate_custom_css .='left: 30px;';
		$vw_construction_estate_custom_css .='}';
	}else if($vw_construction_estate_theme_lay == 'Full Width'){
		$vw_construction_estate_custom_css .='body{';
			$vw_construction_estate_custom_css .='max-width: 100%;';
		$vw_construction_estate_custom_css .='}';
	}

	/*--------------------------- Slider Opacity -------------------*/

	$vw_construction_estate_theme_lay = get_theme_mod( 'vw_construction_estate_slider_opacity_color','0.5');
	if($vw_construction_estate_theme_lay == '0'){
		$vw_construction_estate_custom_css .='.slider img{';
			$vw_construction_estate_custom_css .='opacity:0';
		$vw_construction_estate_custom_css .='}';
		}else if($vw_construction_estate_theme_lay == '0.1'){
		$vw_construction_estate_custom_css .='.slider img{';
			$vw_construction_estate_custom_css .='opacity:0.1';
		$vw_construction_estate_custom_css .='}';
		}else if($vw_construction_estate_theme_lay == '0.2'){
		$vw_construction_estate_custom_css .='.slider img{';
			$vw_construction_estate_custom_css .='opacity:0.2';
		$vw_construction_estate_custom_css .='}';
		}else if($vw_construction_estate_theme_lay == '0.3'){
		$vw_construction_estate_custom_css .='.slider img{';
			$vw_construction_estate_custom_css .='opacity:0.3';
		$vw_construction_estate_custom_css .='}';
		}else if($vw_construction_estate_theme_lay == '0.4'){
		$vw_construction_estate_custom_css .='.slider img{';
			$vw_construction_estate_custom_css .='opacity:0.4';
		$vw_construction_estate_custom_css .='}';
		}else if($vw_construction_estate_theme_lay == '0.5'){
		$vw_construction_estate_custom_css .='.slider img{';
			$vw_construction_estate_custom_css .='opacity:0.5';
		$vw_construction_estate_custom_css .='}';
		}else if($vw_construction_estate_theme_lay == '0.6'){
		$vw_construction_estate_custom_css .='.slider img{';
			$vw_construction_estate_custom_css .='opacity:0.6';
		$vw_construction_estate_custom_css .='}';
		}else if($vw_construction_estate_theme_lay == '0.7'){
		$vw_construction_estate_custom_css .='.slider img{';
			$vw_construction_estate_custom_css .='opacity:0.7';
		$vw_construction_estate_custom_css .='}';
		}else if($vw_construction_estate_theme_lay == '0.8'){
		$vw_construction_estate_custom_css .='.slider img{';
			$vw_construction_estate_custom_css .='opacity:0.8';
		$vw_construction_estate_custom_css .='}';
		}else if($vw_construction_estate_theme_lay == '0.9'){
		$vw_construction_estate_custom_css .='.slider img{';
			$vw_construction_estate_custom_css .='opacity:0.9';
		$vw_construction_estate_custom_css .='}';
		}

	/*--------------------------- Slider Content Layout -------------------*/

	$vw_construction_estate_theme_lay = get_theme_mod( 'vw_construction_estate_slider_content_option','Right');
    if($vw_construction_estate_theme_lay == 'Left'){
		$vw_construction_estate_custom_css .='.slider .carousel-caption, .slider .inner_carousel, .slider .inner_carousel h1{';
			$vw_construction_estate_custom_css .='text-align:left; left:15%; right:45%;';
		$vw_construction_estate_custom_css .='}';
		$vw_construction_estate_custom_css .='.slider .inner_carousel h1{';
			$vw_construction_estate_custom_css .='border-left: 2px solid #f68021; border-right:none;';
		$vw_construction_estate_custom_css .='}';
	}else if($vw_construction_estate_theme_lay == 'Center'){
		$vw_construction_estate_custom_css .='.slider .carousel-caption, .slider .inner_carousel, .slider .inner_carousel h1{';
			$vw_construction_estate_custom_css .='text-align:center; left:20%; right:20%; border-right:none;';
		$vw_construction_estate_custom_css .='}';
	}else if($vw_construction_estate_theme_lay == 'Right'){
		$vw_construction_estate_custom_css .='.slider .carousel-caption, .slider .inner_carousel, .slider .inner_carousel h1{';
			$vw_construction_estate_custom_css .='text-align:right; left:45%; right:15%;';
		$vw_construction_estate_custom_css .='}';
	}

	/*---------------------------Slider Height ------------*/

	$vw_construction_estate_slider_height = get_theme_mod('vw_construction_estate_slider_height');
	if($vw_construction_estate_slider_height != false){
		$vw_construction_estate_custom_css .='.slider img{';
			$vw_construction_estate_custom_css .='height: '.esc_attr($vw_construction_estate_slider_height).';';
		$vw_construction_estate_custom_css .='}';
	}

	/*--------------------------- Slider -------------------*/

	$vw_construction_estate_slider = get_theme_mod('vw_construction_estate_slider_hide_show');
	if($vw_construction_estate_slider == false){
		$vw_construction_estate_custom_css .='.page-template-custom-home-page #header{';
			$vw_construction_estate_custom_css .='margin-bottom: 20px;';
		$vw_construction_estate_custom_css .='}';
	}

	/*---------------------------Blog Layout -------------------*/

	$vw_construction_estate_theme_lay = get_theme_mod( 'vw_construction_estate_blog_layout_option','Default');
    if($vw_construction_estate_theme_lay == 'Default'){
		$vw_construction_estate_custom_css .='.postbox smallpostimage{';
			$vw_construction_estate_custom_css .='';
		$vw_construction_estate_custom_css .='}';
		$vw_construction_estate_custom_css .='.new-text{';
			$vw_construction_estate_custom_css .='padding: 10px 25px;';
		$vw_construction_estate_custom_css .='}';
	}else if($vw_construction_estate_theme_lay == 'Center'){
		$vw_construction_estate_custom_css .='.postbox smallpostimage, .postbox h2, .postbox .metabox, .box-content p, .testbutton, .read_full,.postbox .box-image{';
			$vw_construction_estate_custom_css .='text-align:center;';
		$vw_construction_estate_custom_css .='}';
		$vw_construction_estate_custom_css .='.postbox hr.big{';
			$vw_construction_estate_custom_css .='margin:0 auto;';
		$vw_construction_estate_custom_css .='}';
		$vw_construction_estate_custom_css .='.box-content p, .postbox .metabox{';
			$vw_construction_estate_custom_css .='margin-top: 10px;';
		$vw_construction_estate_custom_css .='}';
	}else if($vw_construction_estate_theme_lay == 'Left'){
		$vw_construction_estate_custom_css .='.postbox smallpostimage, .postbox h2, .postbox .metabox, .box-content p, .testbutton{';
			$vw_construction_estate_custom_css .='text-align:Left;';
		$vw_construction_estate_custom_css .='}';
		$vw_construction_estate_custom_css .='.box-content p,.postbox h2.section-title{';
			$vw_construction_estate_custom_css .='margin-top: 10px;';
		$vw_construction_estate_custom_css .='}';
	}

	/*------------------------------Responsive Media -----------------------*/

	$vw_construction_estate_resp_topbar = get_theme_mod( 'vw_construction_estate_resp_topbar_hide_show',false);
	if($vw_construction_estate_resp_topbar == true && get_theme_mod( 'vw_construction_estate_topbar_hide_show', false) == false){
    	$vw_construction_estate_custom_css .='.top-header{';
			$vw_construction_estate_custom_css .='display:none;';
		$vw_construction_estate_custom_css .='} ';
	}
    if($vw_construction_estate_resp_topbar == true){
    	$vw_construction_estate_custom_css .='@media screen and (max-width:575px) {';
		$vw_construction_estate_custom_css .='.top-header{';
			$vw_construction_estate_custom_css .='display:block;';
		$vw_construction_estate_custom_css .='} }';
	}else if($vw_construction_estate_resp_topbar == false){
		$vw_construction_estate_custom_css .='@media screen and (max-width:575px) {';
		$vw_construction_estate_custom_css .='.top-header{';
			$vw_construction_estate_custom_css .='display:none;';
		$vw_construction_estate_custom_css .='} }';
	}

	$vw_construction_estate_resp_stickyheader = get_theme_mod( 'vw_construction_estate_stickyheader_hide_show',false);
	if($vw_construction_estate_resp_stickyheader == true && get_theme_mod( 'vw_construction_estate_sticky_header',false) != true){
    	$vw_construction_estate_custom_css .='.header-fixed{';
			$vw_construction_estate_custom_css .='position:static;';
		$vw_construction_estate_custom_css .='} ';
	}
    if($vw_construction_estate_resp_stickyheader == true){
    	$vw_construction_estate_custom_css .='@media screen and (max-width:575px) {';
		$vw_construction_estate_custom_css .='.header-fixed{';
			$vw_construction_estate_custom_css .='position:fixed;';
		$vw_construction_estate_custom_css .='} }';
	}else if($vw_construction_estate_resp_stickyheader == false){
		$vw_construction_estate_custom_css .='@media screen and (max-width:575px){';
		$vw_construction_estate_custom_css .='.header-fixed{';
			$vw_construction_estate_custom_css .='position:static;';
		$vw_construction_estate_custom_css .='} }';
	}

	$vw_construction_estate_resp_slider = get_theme_mod( 'vw_construction_estate_resp_slider_hide_show',false);
	if($vw_construction_estate_resp_slider == true && get_theme_mod( 'vw_construction_estate_slider_hide_show', false) == false){
    	$vw_construction_estate_custom_css .='.slider{';
			$vw_construction_estate_custom_css .='display:none;';
		$vw_construction_estate_custom_css .='} ';
	}
    if($vw_construction_estate_resp_slider == true){
    	$vw_construction_estate_custom_css .='@media screen and (max-width:575px) {';
		$vw_construction_estate_custom_css .='.slider{';
			$vw_construction_estate_custom_css .='display:block;';
		$vw_construction_estate_custom_css .='} }';
	}else if($vw_construction_estate_resp_slider == false){
		$vw_construction_estate_custom_css .='@media screen and (max-width:575px) {';
		$vw_construction_estate_custom_css .='.slider{';
			$vw_construction_estate_custom_css .='display:none;';
		$vw_construction_estate_custom_css .='} }';
	}

	$vw_construction_estate_resp_sidebar = get_theme_mod( 'vw_construction_estate_sidebar_hide_show',true);
    if($vw_construction_estate_resp_sidebar == true){
    	$vw_construction_estate_custom_css .='@media screen and (max-width:575px) {';
		$vw_construction_estate_custom_css .='.sidebar{';
			$vw_construction_estate_custom_css .='display:block;';
		$vw_construction_estate_custom_css .='} }';
	}else if($vw_construction_estate_resp_sidebar == false){
		$vw_construction_estate_custom_css .='@media screen and (max-width:575px) {';
		$vw_construction_estate_custom_css .='.sidebar{';
			$vw_construction_estate_custom_css .='display:none;';
		$vw_construction_estate_custom_css .='} }';
	}

	$vw_construction_estate_resp_scroll_top = get_theme_mod( 'vw_construction_estate_resp_scroll_top_hide_show',true);
	if($vw_construction_estate_resp_scroll_top == true && get_theme_mod( 'vw_construction_estate_hide_show_scroll',true) != true){
    	$vw_construction_estate_custom_css .='.scrollup i{';
			$vw_construction_estate_custom_css .='visibility:hidden !important;';
		$vw_construction_estate_custom_css .='} ';
	}
    if($vw_construction_estate_resp_scroll_top == true){
    	$vw_construction_estate_custom_css .='@media screen and (max-width:575px) {';
		$vw_construction_estate_custom_css .='.scrollup i{';
			$vw_construction_estate_custom_css .='visibility:visible !important;';
		$vw_construction_estate_custom_css .='} }';
	}else if($vw_construction_estate_resp_scroll_top == false){
		$vw_construction_estate_custom_css .='@media screen and (max-width:575px){';
		$vw_construction_estate_custom_css .='.scrollup i{';
			$vw_construction_estate_custom_css .='visibility:hidden !important;';
		$vw_construction_estate_custom_css .='} }';
	}

	/*------------- Top Bar Settings ------------------*/

	$vw_construction_estate_topbar_padding_top_bottom = get_theme_mod('vw_construction_estate_topbar_padding_top_bottom');
	if($vw_construction_estate_topbar_padding_top_bottom != false){
		$vw_construction_estate_custom_css .='.top-header{';
			$vw_construction_estate_custom_css .='padding-top: '.esc_attr($vw_construction_estate_topbar_padding_top_bottom).'; padding-bottom: '.esc_attr($vw_construction_estate_topbar_padding_top_bottom).';';
		$vw_construction_estate_custom_css .='}';
	}

	$vw_construction_estate_topbar = get_theme_mod('vw_construction_estate_topbar_hide_show');
	if($vw_construction_estate_topbar == false){
		$vw_construction_estate_custom_css .='#header .custom-social-icons{';
			$vw_construction_estate_custom_css .='margin-top:0px;';
		$vw_construction_estate_custom_css .='}';
	}

	/*-------------- Sticky Header Padding ----------------*/

	$vw_construction_estate_sticky_header_padding = get_theme_mod('vw_construction_estate_sticky_header_padding');
	if($vw_construction_estate_sticky_header_padding != false){
		$vw_construction_estate_custom_css .='.header-fixed{';
			$vw_construction_estate_custom_css .='padding: '.esc_attr($vw_construction_estate_sticky_header_padding).';';
		$vw_construction_estate_custom_css .='}';
	}

	/*---------------- Button Settings ------------------*/

	$vw_construction_estate_button_padding_top_bottom = get_theme_mod('vw_construction_estate_button_padding_top_bottom');
	$vw_construction_estate_button_padding_left_right = get_theme_mod('vw_construction_estate_button_padding_left_right');
	if($vw_construction_estate_button_padding_top_bottom != false || $vw_construction_estate_button_padding_left_right != false){
		$vw_construction_estate_custom_css .='.read_full a{';
			$vw_construction_estate_custom_css .='padding-top: '.esc_attr($vw_construction_estate_button_padding_top_bottom).'; padding-bottom: '.esc_attr($vw_construction_estate_button_padding_top_bottom).';padding-left: '.esc_attr($vw_construction_estate_button_padding_left_right).';padding-right: '.esc_attr($vw_construction_estate_button_padding_left_right).';';
		$vw_construction_estate_custom_css .='}';
	}

	$vw_construction_estate_button_border_radius = get_theme_mod('vw_construction_estate_button_border_radius');
	if($vw_construction_estate_button_border_radius != false){
		$vw_construction_estate_custom_css .='.read_full a{';
			$vw_construction_estate_custom_css .='border-radius: '.esc_attr($vw_construction_estate_button_border_radius).'px;';
		$vw_construction_estate_custom_css .='}';
	}

	/*------------- Single Blog Page------------------*/

	$vw_construction_estate_single_blog_post_navigation_show_hide = get_theme_mod('vw_construction_estate_single_blog_post_navigation_show_hide',true);
	if($vw_construction_estate_single_blog_post_navigation_show_hide != true){
		$vw_construction_estate_custom_css .='.post-navigation{';
			$vw_construction_estate_custom_css .='display: none;';
		$vw_construction_estate_custom_css .='}';
	}

	/*-------------- Copyright Alignment ----------------*/

	$vw_construction_estate_copyright_alingment = get_theme_mod('vw_construction_estate_copyright_alingment');
	if($vw_construction_estate_copyright_alingment != false){
		$vw_construction_estate_custom_css .='.copyright p{';
			$vw_construction_estate_custom_css .='text-align: '.esc_attr($vw_construction_estate_copyright_alingment).';';
		$vw_construction_estate_custom_css .='}';
	}

	$vw_construction_estate_copyright_padding_top_bottom = get_theme_mod('vw_construction_estate_copyright_padding_top_bottom');
	if($vw_construction_estate_copyright_padding_top_bottom != false){
		$vw_construction_estate_custom_css .='.footer-2{';
			$vw_construction_estate_custom_css .='padding-top: '.esc_attr($vw_construction_estate_copyright_padding_top_bottom).'; padding-bottom: '.esc_attr($vw_construction_estate_copyright_padding_top_bottom).';';
		$vw_construction_estate_custom_css .='}';
	}

	/*----------------Sroll to top Settings ------------------*/

	$vw_construction_estate_scroll_to_top_font_size = get_theme_mod('vw_construction_estate_scroll_to_top_font_size');
	if($vw_construction_estate_scroll_to_top_font_size != false){
		$vw_construction_estate_custom_css .='.scrollup i{';
			$vw_construction_estate_custom_css .='font-size: '.esc_attr($vw_construction_estate_scroll_to_top_font_size).';';
		$vw_construction_estate_custom_css .='}';
	}

	$vw_construction_estate_scroll_to_top_padding = get_theme_mod('vw_construction_estate_scroll_to_top_padding');
	$vw_construction_estate_scroll_to_top_padding = get_theme_mod('vw_construction_estate_scroll_to_top_padding');
	if($vw_construction_estate_scroll_to_top_padding != false){
		$vw_construction_estate_custom_css .='.scrollup i{';
			$vw_construction_estate_custom_css .='padding-top: '.esc_attr($vw_construction_estate_scroll_to_top_padding).';padding-bottom: '.esc_attr($vw_construction_estate_scroll_to_top_padding).';';
		$vw_construction_estate_custom_css .='}';
	}

	$vw_construction_estate_scroll_to_top_width = get_theme_mod('vw_construction_estate_scroll_to_top_width');
	if($vw_construction_estate_scroll_to_top_width != false){
		$vw_construction_estate_custom_css .='.scrollup i{';
			$vw_construction_estate_custom_css .='width: '.esc_attr($vw_construction_estate_scroll_to_top_width).';';
		$vw_construction_estate_custom_css .='}';
	}

	$vw_construction_estate_scroll_to_top_height = get_theme_mod('vw_construction_estate_scroll_to_top_height');
	if($vw_construction_estate_scroll_to_top_height != false){
		$vw_construction_estate_custom_css .='.scrollup i{';
			$vw_construction_estate_custom_css .='height: '.esc_attr($vw_construction_estate_scroll_to_top_height).';';
		$vw_construction_estate_custom_css .='}';
	}

	$vw_construction_estate_scroll_to_top_border_radius = get_theme_mod('vw_construction_estate_scroll_to_top_border_radius');
	if($vw_construction_estate_scroll_to_top_border_radius != false){
		$vw_construction_estate_custom_css .='.scrollup i{';
			$vw_construction_estate_custom_css .='border-radius: '.esc_attr($vw_construction_estate_scroll_to_top_border_radius).'px;';
		$vw_construction_estate_custom_css .='}';
	}

	/*----------------Social Icons Settings ------------------*/

	$vw_construction_estate_social_icon_font_size = get_theme_mod('vw_construction_estate_social_icon_font_size');
	if($vw_construction_estate_social_icon_font_size != false){
		$vw_construction_estate_custom_css .='.sidebar .custom-social-icons i, .footer .custom-social-icons i{';
			$vw_construction_estate_custom_css .='font-size: '.esc_attr($vw_construction_estate_social_icon_font_size).';';
		$vw_construction_estate_custom_css .='}';
	}

	$vw_construction_estate_social_icon_padding = get_theme_mod('vw_construction_estate_social_icon_padding');
	if($vw_construction_estate_social_icon_padding != false){
		$vw_construction_estate_custom_css .='.sidebar .custom-social-icons i, .footer .custom-social-icons i{';
			$vw_construction_estate_custom_css .='padding: '.esc_attr($vw_construction_estate_social_icon_padding).';';
		$vw_construction_estate_custom_css .='}';
	}

	$vw_construction_estate_social_icon_width = get_theme_mod('vw_construction_estate_social_icon_width');
	if($vw_construction_estate_social_icon_width != false){
		$vw_construction_estate_custom_css .='.sidebar .custom-social-icons i, .footer .custom-social-icons i{';
			$vw_construction_estate_custom_css .='width: '.esc_attr($vw_construction_estate_social_icon_width).';';
		$vw_construction_estate_custom_css .='}';
	}

	$vw_construction_estate_social_icon_height = get_theme_mod('vw_construction_estate_social_icon_height');
	if($vw_construction_estate_social_icon_height != false){
		$vw_construction_estate_custom_css .='.sidebar .custom-social-icons i, .footer .custom-social-icons i{';
			$vw_construction_estate_custom_css .='height: '.esc_attr($vw_construction_estate_social_icon_height).';';
		$vw_construction_estate_custom_css .='}';
	}

	$vw_construction_estate_social_icon_border_radius = get_theme_mod('vw_construction_estate_social_icon_border_radius');
	if($vw_construction_estate_social_icon_border_radius != false){
		$vw_construction_estate_custom_css .='.sidebar .custom-social-icons i, .footer .custom-social-icons i{';
			$vw_construction_estate_custom_css .='border-radius: '.esc_attr($vw_construction_estate_social_icon_border_radius).'px;';
		$vw_construction_estate_custom_css .='}';
	}

	/*----------------Woocommerce Products Settings ------------------*/

	$vw_construction_estate_products_padding_top_bottom = get_theme_mod('vw_construction_estate_products_padding_top_bottom');
	if($vw_construction_estate_products_padding_top_bottom != false){
		$vw_construction_estate_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$vw_construction_estate_custom_css .='padding-top: '.esc_attr($vw_construction_estate_products_padding_top_bottom).'!important; padding-bottom: '.esc_attr($vw_construction_estate_products_padding_top_bottom).'!important;';
		$vw_construction_estate_custom_css .='}';
	}

	$vw_construction_estate_products_padding_left_right = get_theme_mod('vw_construction_estate_products_padding_left_right');
	if($vw_construction_estate_products_padding_left_right != false){
		$vw_construction_estate_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$vw_construction_estate_custom_css .='padding-left: '.esc_attr($vw_construction_estate_products_padding_left_right).'!important; padding-right: '.esc_attr($vw_construction_estate_products_padding_left_right).'!important;';
		$vw_construction_estate_custom_css .='}';
	}

	$vw_construction_estate_products_box_shadow = get_theme_mod('vw_construction_estate_products_box_shadow');
	if($vw_construction_estate_products_box_shadow != false){
		$vw_construction_estate_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
				$vw_construction_estate_custom_css .='box-shadow: '.esc_attr($vw_construction_estate_products_box_shadow).'px '.esc_attr($vw_construction_estate_products_box_shadow).'px '.esc_attr($vw_construction_estate_products_box_shadow).'px #ddd;';
		$vw_construction_estate_custom_css .='}';
	}

	$vw_construction_estate_products_border_radius = get_theme_mod('vw_construction_estate_products_border_radius');
	if($vw_construction_estate_products_border_radius != false){
		$vw_construction_estate_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$vw_construction_estate_custom_css .='border-radius: '.esc_attr($vw_construction_estate_products_border_radius).'px;';
		$vw_construction_estate_custom_css .='}';
	}

	$vw_construction_estate_products_button_border_radius = get_theme_mod('vw_construction_estate_products_button_border_radius');
	if($vw_construction_estate_products_button_border_radius != false){
		$vw_construction_estate_custom_css .='.woocommerce ul.products li.product .button, a.checkout-button.button.alt.wc-forward,.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt{';
			$vw_construction_estate_custom_css .='border-radius: '.esc_attr($vw_construction_estate_products_button_border_radius).'px;';
		$vw_construction_estate_custom_css .='}';
	}

	$vw_construction_estate_woocommerce_sale_font_size = get_theme_mod('vw_construction_estate_woocommerce_sale_font_size');
	if($vw_construction_estate_woocommerce_sale_font_size != false){
		$vw_construction_estate_custom_css .='.woocommerce span.onsale{';
			$vw_construction_estate_custom_css .='font-size: '.esc_attr($vw_construction_estate_woocommerce_sale_font_size).';';
		$vw_construction_estate_custom_css .='}';
	}

	$vw_construction_estate_woocommerce_sale_border_radius = get_theme_mod('vw_construction_estate_woocommerce_sale_border_radius', 100);
	if($vw_construction_estate_woocommerce_sale_border_radius != false){
		$vw_construction_estate_custom_css .='.woocommerce span.onsale{';
			$vw_construction_estate_custom_css .='border-radius: '.esc_attr($vw_construction_estate_woocommerce_sale_border_radius).'px;';
		$vw_construction_estate_custom_css .='}';
	}

	/*------------------ Logo  -------------------*/

	// Site title Font Size
	$vw_construction_estate_site_title_font_size = get_theme_mod('vw_construction_estate_site_title_font_size');
	if($vw_construction_estate_site_title_font_size != false){
		$vw_construction_estate_custom_css .='#header .logo h1, #header .logo p.site-title{';
			$vw_construction_estate_custom_css .='font-size: '.esc_attr($vw_construction_estate_site_title_font_size).';';
		$vw_construction_estate_custom_css .='}';
	}

	// Site tagline Font Size
	$vw_construction_estate_site_tagline_font_size = get_theme_mod('vw_construction_estate_site_tagline_font_size');
	if($vw_construction_estate_site_tagline_font_size != false){
		$vw_construction_estate_custom_css .='#header .logo p.site-description{';
			$vw_construction_estate_custom_css .='font-size: '.esc_attr($vw_construction_estate_site_tagline_font_size).';';
		$vw_construction_estate_custom_css .='}';
	}

	/*------------------ Preloader Background Color  -------------------*/

	$vw_construction_estate_preloader_bg_color = get_theme_mod('vw_construction_estate_preloader_bg_color');
	if($vw_construction_estate_preloader_bg_color != false){
		$vw_construction_estate_custom_css .='#preloader{';
			$vw_construction_estate_custom_css .='background-color: '.esc_attr($vw_construction_estate_preloader_bg_color).';';
		$vw_construction_estate_custom_css .='}';
	}

	$vw_construction_estate_preloader_border_color = get_theme_mod('vw_construction_estate_preloader_border_color');
	if($vw_construction_estate_preloader_border_color != false){
		$vw_construction_estate_custom_css .='.loader-line{';
			$vw_construction_estate_custom_css .='border-color: '.esc_attr($vw_construction_estate_preloader_border_color).'!important;';
		$vw_construction_estate_custom_css .='}';
	}
