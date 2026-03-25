<?php
//about theme info
add_action( 'admin_menu', 'vw_construction_estate_gettingstarted' );
function vw_construction_estate_gettingstarted() {    	
	add_theme_page( esc_html__('About VW Construction Estate Lite', 'vw-construction-estate'), esc_html__('About VW Construction Estate Lite', 'vw-construction-estate'), 'edit_theme_options', 'vw_construction_estate_guide', 'vw_construction_estate_mostrar_guide');   
}

// Add a Custom CSS file to WP Admin Area
function vw_construction_estate_admin_theme_style() {
   wp_enqueue_style('vw-construction-estate-custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/get-started/get-started.css');
   wp_enqueue_script('vw-construction-estate-tabs', esc_url(get_template_directory_uri()) . '/inc/get-started/js/tab.js');
   wp_enqueue_style( 'font-awesome-css', esc_url(get_template_directory_uri()).'/css/fontawesome-all.css' );
}
add_action('admin_enqueue_scripts', 'vw_construction_estate_admin_theme_style');

//guidline for about theme
function vw_construction_estate_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
	$theme = wp_get_theme( 'vw-construction-estate' );
?>

<div class="wrapper-info">
    <div class="col-left">
    	<h2><?php esc_html_e( 'Welcome to VW Construction Estate', 'vw-construction-estate' ); ?> <span class="version">Version: <?php echo esc_html($theme['Version']);?></span></h2>
    	<p><?php esc_html_e('All our WordPress themes are modern, minimalist, 100% responsive, seo-friendly,feature-rich, and multipurpose that best suit designers, bloggers and other professionals who are working in the creative fields.','vw-construction-estate'); ?></p>
    </div>
    <div class="col-right">
    	<div class="logo">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/get-started/images/final-logo.png" alt="" />
		</div>
		<div class="update-now">
			<h4><?php esc_html_e('Buy VW Construction Estate at 20% Discount','vw-construction-estate'); ?></h4>
			<h4><?php esc_html_e('Use Coupon','vw-construction-estate'); ?> ( <span><?php esc_html_e('vwpro20','vw-construction-estate'); ?></span> ) </h4>
			<div class="info-link">
				<a href="<?php echo esc_url( VW_CONSTRUCTION_ESTATE_BUY_NOW ); ?>" target="_blank"> <?php esc_html_e( 'Upgrade to Pro', 'vw-construction-estate' ); ?></a>
			</div>
		</div>
    </div>

    <div class="tab-sec">
		<div class="tab">
			<button class="tablinks" onclick="vw_construction_estate_open_tab(event, 'lite_theme')"><?php esc_html_e( 'Setup With Customizer', 'vw-construction-estate' ); ?></button>
			<button class="tablinks" onclick="vw_construction_estate_open_tab(event, 'block_pattern')"><?php esc_html_e( 'Setup With Block Pattern', 'vw-construction-estate' ); ?></button>
			<button class="tablinks" onclick="vw_construction_estate_open_tab(event, 'gutenberg_editor')"><?php esc_html_e( 'Setup With Gutunberg Block', 'vw-construction-estate' ); ?></button>	  
		  	<button class="tablinks" onclick="vw_construction_estate_open_tab(event, 'theme_pro')"><?php esc_html_e( 'Get Premium', 'vw-construction-estate' ); ?></button>
		  	<button class="tablinks" onclick="vw_construction_estate_open_tab(event, 'free_pro')"><?php esc_html_e( 'Support', 'vw-construction-estate' ); ?></button>
		</div>

		<!-- Tab content -->
		<?php
			$vw_construction_estate_plugin_custom_css = '';
			if(class_exists('Ibtana_Visual_Editor_Menu_Class')){
				$vw_construction_estate_plugin_custom_css ='display: block';
			}
		?>
		<div id="lite_theme" class="tabcontent open">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
				$plugin_ins = VW_Construction_Estate_Plugin_Activation_Settings::get_instance();
				$vw_construction_estate_actions = $plugin_ins->recommended_actions;
				?>
				<div class="vw-construction-estate-recommended-plugins">
				    <div class="vw-construction-estate-action-list">
				        <?php if ($vw_construction_estate_actions): foreach ($vw_construction_estate_actions as $key => $vw_construction_estate_actionValue): ?>
				                <div class="vw-construction-estate-action" id="<?php echo esc_attr($vw_construction_estate_actionValue['id']);?>">
			                        <div class="action-inner">
			                            <h3 class="action-title"><?php echo esc_html($vw_construction_estate_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($vw_construction_estate_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($vw_construction_estate_actionValue['link']); ?>
			                            <a class="ibtana-skip-btn" get-start-tab-id="lite-theme-tab" href="javascript:void(0);"><?php esc_html_e('Skip','vw-construction-estate'); ?></a>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php } ?>
			<div class="lite-theme-tab" style="<?php echo esc_attr($vw_construction_estate_plugin_custom_css); ?>">
				<h3><?php esc_html_e( 'Lite Theme Information', 'vw-construction-estate' ); ?></h3>
				<hr class="h3hr">
			  	<p><?php esc_html_e('The VW Construction Real Estate WordPress theme is a one-stop solution for all your online businesses in the building and construction field. It is a multipurpose construction theme which finds its application in wide range of business building websites. No matter if you are a property dealer, real estate agent, broker, contractor, builder, or runs a construction company our Construction WordPress theme is all you need to see your online business reaching the pinnacle of success. Although it is focused on construction businesses it can also be used for business in architecture, renovation, repair etc. It allows the personalised option to use it as a blog or a portfolio website. VW Construction theme is loaded with high-class features and superb functionality. It complies with all the latest features like responsiveness, cross-browser compatibility, SEO friendly, short codes, Call to Action button(CTA), social media shareable, retina ready, multiple page layouts etc. The code written by our experts is clean and secure which makes page loading faster. Its simple and adaptable design makes it a user-friendly theme. Its  customization allows you to give it the best look you desire for your site. Its colour palette allows you to change the colour of your website whenever you want giving it a fresh look. Get it now and let it work on your behalf to touch the sky of success.','vw-construction-estate'); ?></p>
			  	<div class="col-left-inner">
			  		<h4><?php esc_html_e( 'Theme Documentation', 'vw-construction-estate' ); ?></h4>
					<p><?php esc_html_e( 'If you need any assistance regarding setting up and configuring the Theme, our documentation is there.', 'vw-construction-estate' ); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( VW_CONSTRUCTION_ESTATE_FREE_THEME_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Documentation', 'vw-construction-estate' ); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Theme Customizer', 'vw-construction-estate'); ?></h4>
					<p> <?php esc_html_e('To begin customizing your website, start by clicking "Customize".', 'vw-construction-estate'); ?></p>
					<div class="info-link">
						<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'vw-construction-estate'); ?></a>
					</div>
					<hr>				
					<h4><?php esc_html_e('Having Trouble, Need Support?', 'vw-construction-estate'); ?></h4>
					<p> <?php esc_html_e('Our dedicated team is well prepared to help you out in case of queries and doubts regarding our theme.', 'vw-construction-estate'); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( VW_CONSTRUCTION_ESTATE_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support Forum', 'vw-construction-estate'); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Reviews & Testimonials', 'vw-construction-estate'); ?></h4>
					<p> <?php esc_html_e('All the features and aspects of this WordPress Theme are phenomenal. I\'d recommend this theme to all.', 'vw-construction-estate'); ?>  </p>
					<div class="info-link">
						<a href="<?php echo esc_url( VW_CONSTRUCTION_ESTATE_REVIEW ); ?>" target="_blank"><?php esc_html_e('Reviews', 'vw-construction-estate'); ?></a>
					</div>
			  		<div class="link-customizer">
						<h3><?php esc_html_e( 'Link to customizer', 'vw-construction-estate' ); ?></h3>
						<hr class="h3hr">
						<div class="first-row">
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','vw-construction-estate'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-welcome-write-blog"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_construction_estate_contact') ); ?>" target="_blank"><?php esc_html_e('Contact Us','vw-construction-estate'); ?></a>
								</div>
							</div>
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-slides"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_construction_estate_slidersettings') ); ?>" target="_blank"><?php esc_html_e('Slider','vw-construction-estate'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-editor-table"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_construction_estate_about') ); ?>" target="_blank"><?php esc_html_e('About Section','vw-construction-estate'); ?></a>
								</div>
							</div>
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-admin-customizer"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=vw_construction_estate_typography') ); ?>" target="_blank"><?php esc_html_e('Typography','vw-construction-estate'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','vw-construction-estate'); ?></a>
								</div>
							</div>

							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_construction_estate_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','vw-construction-estate'); ?></a>
								</div>
								 <div class="row-box2">
									<span class="dashicons dashicons-align-center"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_construction_estate_woocommerce_section') ); ?>" target="_blank"><?php esc_html_e('WooCommerce Layout','vw-construction-estate'); ?></a>
								</div> 
							</div>

							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-editor-contract"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_construction_estate_consultant') ); ?>" target="_blank"><?php esc_html_e('Consultant Section','vw-construction-estate'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_construction_estate_footer_section') ); ?>" target="_blank"><?php esc_html_e('Footer Text','vw-construction-estate'); ?></a>
								</div>
							</div>
						</div>
					</div>
			  	</div>
				<div class="col-right-inner">
					<h3 class="page-template"><?php esc_html_e('How to set up Home Page Template','vw-construction-estate'); ?></h3>
				  	<hr class="h3hr">
					<p><?php esc_html_e('Follow these instructions to setup Home page.','vw-construction-estate'); ?></p>
	                <ul>
	                  	<p><span class="strong"><?php esc_html_e('1. Create a new page :','vw-construction-estate'); ?></span><?php esc_html_e(' Go to ','vw-construction-estate'); ?>
					  	<b><?php esc_html_e(' Dashboard >> Pages >> Add New Page','vw-construction-estate'); ?></b></p>

	                  	<p><?php esc_html_e('Name it as "Home" then select the template "Custom Home Page".','vw-construction-estate'); ?></p>
	                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/get-started/images/home-page-template.png" alt="" />
	                  	<p><span class="strong"><?php esc_html_e('2. Set the front page:','vw-construction-estate'); ?></span><?php esc_html_e(' Go to ','vw-construction-estate'); ?>
					  	<b><?php esc_html_e(' Settings >> Reading ','vw-construction-estate'); ?></b></p>
					  	<p><?php esc_html_e('Select the option of Static Page, now select the page you created to be the homepage, while another page to be your default page.','vw-construction-estate'); ?></p>
	                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/get-started/images/set-front-page.png" alt="" />
	                  	<p><?php esc_html_e(' Once you are done with this, then follow the','vw-construction-estate'); ?> <a class="doc-links" href="https://www.vwthemesdemo.com/docs/free-vw-construction-estate/" target="_blank"><?php esc_html_e('Documentation','vw-construction-estate'); ?></a></p>
	                </ul>
			  	</div>
			</div>
		</div>

		<div id="block_pattern" class="tabcontent">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
				$plugin_ins = VW_Construction_Estate_Plugin_Activation_Settings::get_instance();
				$vw_construction_estate_actions = $plugin_ins->recommended_actions;
				?>
				<div class="vw-construction-estate-recommended-plugins">
				    <div class="vw-construction-estate-action-list">
				        <?php if ($vw_construction_estate_actions): foreach ($vw_construction_estate_actions as $key => $vw_construction_estate_actionValue): ?>
				                <div class="vw-construction-estate-action" id="<?php echo esc_attr($vw_construction_estate_actionValue['id']);?>">
			                        <div class="action-inner">
			                            <h3 class="action-title"><?php echo esc_html($vw_construction_estate_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($vw_construction_estate_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($vw_construction_estate_actionValue['link']); ?>
			                            <a class="ibtana-skip-btn" href="javascript:void(0);" get-start-tab-id="gutenberg-editor-tab"><?php esc_html_e('Skip','vw-construction-estate'); ?></a>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php } ?>
			<div class="gutenberg-editor-tab" style="<?php echo esc_attr($vw_construction_estate_plugin_custom_css); ?>">
				<div class="block-pattern-img">
				  	<h3><?php esc_html_e( 'Block Patterns', 'vw-construction-estate' ); ?></h3>
					<hr class="h3hr">
					<p><?php esc_html_e('Follow the below instructions to setup Home page with Block Patterns.','vw-construction-estate'); ?></p>
	              	<p><b><?php esc_html_e('Click on Below Add new page button >> Click on "+" Icon >> Click Pattern Tab >> Click on homepage sections >> Publish.','vw-construction-estate'); ?></span></b></p>
	              	<div class="vw-construction-estate-pattern-page">
				    	<a href="javascript:void(0)" class="vw-pattern-page-btn button-primary button"><?php esc_html_e('Add New Page','vw-construction-estate'); ?></a>
				    </div>
	              	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/get-started/images/block-pattern.png" alt="" />
	            </div>

	            <div class="block-pattern-link-customizer">
	              	<div class="link-customizer-with-block-pattern">
							<h3><?php esc_html_e( 'Link to customizer', 'vw-construction-estate' ); ?></h3>
							<hr class="h3hr">
							<div class="first-row">
								<div class="row-box">
									<div class="row-box1">
										<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','vw-construction-estate'); ?></a>
									</div>
									<div class="row-box2">
										<span class="dashicons dashicons-networking"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_construction_estate_social_icon_settings') ); ?>" target="_blank"><?php esc_html_e('Social Icons','vw-construction-estate'); ?></a>
									</div>
								</div>
								<div class="row-box">
									<div class="row-box1">
										<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','vw-construction-estate'); ?></a>
									</div>
									
									<div class="row-box2">
										<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_construction_estate_footer_section') ); ?>" target="_blank"><?php esc_html_e('Footer Text','vw-construction-estate'); ?></a>
									</div>
								</div>

								<div class="row-box">
									<div class="row-box1">
										<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_construction_estate_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','vw-construction-estate'); ?></a>
									</div>
									 <div class="row-box2">
										<span class="dashicons dashicons-align-center"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_construction_estate_woocommerce_section') ); ?>" target="_blank"><?php esc_html_e('WooCommerce Layout','vw-construction-estate'); ?></a>
									</div> 
								</div>
								
								<div class="row-box">
									<div class="row-box1">
										<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_construction_estate_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','vw-construction-estate'); ?></a>
									</div>
									 <div class="row-box2">
										<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','vw-construction-estate'); ?></a>
									</div> 
								</div>
							</div>
					</div>	
				</div>					
	        </div>
		</div>

		<div id="gutenberg_editor" class="tabcontent">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
			$plugin_ins = VW_Construction_Estate_Plugin_Activation_Settings::get_instance();
			$vw_construction_estate_actions = $plugin_ins->recommended_actions;
			?>
				<div class="vw-construction-estate-recommended-plugins">
				    <div class="vw-construction-estate-action-list">
				        <?php if ($vw_construction_estate_actions): foreach ($vw_construction_estate_actions as $key => $vw_construction_estate_actionValue): ?>
				                <div class="vw-construction-estate-action" id="<?php echo esc_attr($vw_construction_estate_actionValue['id']);?>">
			                        <div class="action-inner plugin-activation-redirect">
			                            <h3 class="action-title"><?php echo esc_html($vw_construction_estate_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($vw_construction_estate_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($vw_construction_estate_actionValue['link']); ?>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php }else{ ?>
				<h3><?php esc_html_e( 'Gutunberg Blocks', 'vw-construction-estate' ); ?></h3>
				<hr class="h3hr">
				<div class="vw-construction-estate-pattern-page">
			    	<a href="<?php echo esc_url( admin_url( 'admin.php?page=ibtana-visual-editor-templates' ) ); ?>" class="vw-pattern-page-btn ibtana-dashboard-page-btn button-primary button"><?php esc_html_e('Ibtana Settings','vw-construction-estate'); ?></a>
			    </div>

			    <div class="link-customizer-with-guternberg-ibtana">
					<h3><?php esc_html_e( 'Link to customizer', 'vw-construction-estate' ); ?></h3>
					<hr class="h3hr">
					<div class="first-row">
						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','vw-construction-estate'); ?></a>
							</div>
							<div class="row-box2">
								<span class="dashicons dashicons-networking"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_construction_estate_social_icon_settings') ); ?>" target="_blank"><?php esc_html_e('Social Icons','vw-construction-estate'); ?></a>
							</div>
						</div>
						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','vw-construction-estate'); ?></a>
							</div>
							
							<div class="row-box2">
								<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_construction_estate_footer_section') ); ?>" target="_blank"><?php esc_html_e('Footer Text','vw-construction-estate'); ?></a>
							</div>
						</div>

						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_construction_estate_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','vw-construction-estate'); ?></a>
							</div>
							 <div class="row-box2">
								<span class="dashicons dashicons-align-center"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_construction_estate_woocommerce_section') ); ?>" target="_blank"><?php esc_html_e('WooCommerce Layout','vw-construction-estate'); ?></a>
							</div> 
						</div>
						
						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_construction_estate_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','vw-construction-estate'); ?></a>
							</div>
							 <div class="row-box2">
								<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','vw-construction-estate'); ?></a>
							</div> 
						</div>
					</div>
				</div>
			<?php } ?>
		</div>	

		<div id="theme_pro" class="tabcontent">
		  	<h3><?php esc_html_e( 'Premium Theme Information', 'vw-construction-estate' ); ?></h3>
			<hr class="h3hr">
		    <div class="col-left-pro">
		    	<p><?php esc_html_e('Our premium Construction WordPress theme finds its application in wide range of building and construction businesses. It can be used by land dealers, real estate agents, contractors, builders, architects, construction material traders, property dealers, renovation business, repair businesses etc.Its unique design will give the best online platform for your business. You can even demonstrate your work through the gallery. A website designed with our theme will speak for your work. Our theme comes with jam-packed features and high-quality functions. It supports a wide variety of plugins to implement any functionality you wish to have on your site. Its professional look will make your business stand out and help boost it in the best possible way. It has a user-friendly design which allows easy navigation. It is designed to give maximum exposure to your quality work. Work is worship for us. Hence we do not compromise with the quality and deliver the best to our customers ','vw-construction-estate'); ?></p>
		    	<div class="pro-links">
			    	<a href="<?php echo esc_url( VW_CONSTRUCTION_ESTATE_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'vw-construction-estate'); ?></a>
					<a href="<?php echo esc_url( VW_CONSTRUCTION_ESTATE_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Buy Pro', 'vw-construction-estate'); ?></a>
					<a href="<?php echo esc_url( VW_CONSTRUCTION_ESTATE_PRO_DOC ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'vw-construction-estate'); ?></a>
				</div>
		    </div>
		    <div class="col-right-pro">
		    	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/get-started/images/vw-construction.png" alt="" />
		    </div>
		    <div class="featurebox">
			    <h3><?php esc_html_e( 'Theme Features', 'vw-construction-estate' ); ?></h3>
				<hr class="h3hr">
				<div class="table-image">
					<table class="tablebox">
						<thead>
							<tr>
								<th></th>
								<th><?php esc_html_e('Free Themes', 'vw-construction-estate'); ?></th>
								<th><?php esc_html_e('Premium Themes', 'vw-construction-estate'); ?></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php esc_html_e('Theme Customization', 'vw-construction-estate'); ?></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Responsive Design', 'vw-construction-estate'); ?></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Logo Upload', 'vw-construction-estate'); ?></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Social Media Links', 'vw-construction-estate'); ?></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Slider Settings', 'vw-construction-estate'); ?></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Number of Slides', 'vw-construction-estate'); ?></td>
								<td class="table-img"><?php esc_html_e('4', 'vw-construction-estate'); ?></td>
								<td class="table-img"><?php esc_html_e('Unlimited', 'vw-construction-estate'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Template Pages', 'vw-construction-estate'); ?></td>
								<td class="table-img"><?php esc_html_e('3', 'vw-construction-estate'); ?></td>
								<td class="table-img"><?php esc_html_e('6', 'vw-construction-estate'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Home Page Template', 'vw-construction-estate'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'vw-construction-estate'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'vw-construction-estate'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Theme sections', 'vw-construction-estate'); ?></td>
								<td class="table-img"><?php esc_html_e('2', 'vw-construction-estate'); ?></td>
								<td class="table-img"><?php esc_html_e('15', 'vw-construction-estate'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Contact us Page Template', 'vw-construction-estate'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('1', 'vw-construction-estate'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Blog Templates & Layout', 'vw-construction-estate'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('3(Full width/Left/Right Sidebar)', 'vw-construction-estate'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Page Templates & Layout', 'vw-construction-estate'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('2(Left/Right Sidebar)', 'vw-construction-estate'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Color Pallete For Particular Sections', 'vw-construction-estate'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Global Color Option', 'vw-construction-estate'); ?></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Reordering', 'vw-construction-estate'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Demo Importer', 'vw-construction-estate'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Allow To Set Site Title, Tagline, Logo', 'vw-construction-estate'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Enable Disable Options On All Sections, Logo', 'vw-construction-estate'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Full Documentation', 'vw-construction-estate'); ?></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Latest WordPress Compatibility', 'vw-construction-estate'); ?></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Woo-Commerce Compatibility', 'vw-construction-estate'); ?></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Support 3rd Party Plugins', 'vw-construction-estate'); ?></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Secure and Optimized Code', 'vw-construction-estate'); ?></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Exclusive Functionalities', 'vw-construction-estate'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Enable / Disable', 'vw-construction-estate'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Section Google Font Choices', 'vw-construction-estate'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Gallery', 'vw-construction-estate'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Simple & Mega Menu Option', 'vw-construction-estate'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Support to add custom CSS / JS ', 'vw-construction-estate'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Shortcodes', 'vw-construction-estate'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Background, Colors, Header, Logo & Menu', 'vw-construction-estate'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Premium Membership', 'vw-construction-estate'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Budget Friendly Value', 'vw-construction-estate'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Priority Error Fixing', 'vw-construction-estate'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Feature Addition', 'vw-construction-estate'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('All Access Theme Pass', 'vw-construction-estate'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Seamless Customer Support', 'vw-construction-estate'); ?></td>
								<td class="table-img"><i class="fas fa-times"></i></td>
								<td class="table-img"><i class="fas fa-check"></i></td>
							</tr>
							<tr>
								<td></td>
								<td class="table-img"></td>
								<td class="update-link"><a href="<?php echo esc_url( VW_CONSTRUCTION_ESTATE_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Upgrade to Pro', 'vw-construction-estate'); ?></a></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div id="free_pro" class="tabcontent">
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-star-filled"></span><?php esc_html_e('Pro Version', 'vw-construction-estate'); ?></h4>
				<p> <?php esc_html_e('To gain access to extra theme options and more interesting features, upgrade to pro version.', 'vw-construction-estate'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_CONSTRUCTION_ESTATE_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Get Pro', 'vw-construction-estate'); ?></a>
				</div>
		  	</div>
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-cart"></span><?php esc_html_e('Pre-purchase Queries', 'vw-construction-estate'); ?></h4>
				<p> <?php esc_html_e('If you have any pre-sale query, we are prepared to resolve it.', 'vw-construction-estate'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_CONSTRUCTION_ESTATE_CONTACT ); ?>" target="_blank"><?php esc_html_e('Question', 'vw-construction-estate'); ?></a>
				</div>
		  	</div>
		  	<div class="col-3">		  		
		  		<h4><span class="dashicons dashicons-admin-customizer"></span><?php esc_html_e('Child Theme', 'vw-construction-estate'); ?></h4>
				<p> <?php esc_html_e('For theme file customizations, make modifications in the child theme and not in the main theme file.', 'vw-construction-estate'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_CONSTRUCTION_ESTATE_CHILD_THEME ); ?>" target="_blank"><?php esc_html_e('About Child Theme', 'vw-construction-estate'); ?></a>
				</div>
		  	</div>

		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-admin-comments"></span><?php esc_html_e('Frequently Asked Questions', 'vw-construction-estate'); ?></h4>
				<p> <?php esc_html_e('We have gathered top most, frequently asked questions and answered them for your easy understanding. We will list down more as we get new challenging queries. Check back often.', 'vw-construction-estate'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_CONSTRUCTION_ESTATE_FAQ ); ?>" target="_blank"><?php esc_html_e('View FAQ','vw-construction-estate'); ?></a>
				</div>
		  	</div>

		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-sos"></span><?php esc_html_e('Support Queries', 'vw-construction-estate'); ?></h4>
				<p> <?php esc_html_e('If you have any queries after purchase, you can contact us. We are eveready to help you out.', 'vw-construction-estate'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_CONSTRUCTION_ESTATE_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Contact Us', 'vw-construction-estate'); ?></a>
				</div>
		  	</div>
		</div>
	</div>
</div>
<?php } ?>
