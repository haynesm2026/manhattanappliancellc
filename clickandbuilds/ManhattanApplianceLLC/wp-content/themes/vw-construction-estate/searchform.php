<?php
/**
 * The template for displaying search forms in VW Construction Estate
 *
 * @package VW Construction Estate
 */
?>
<form method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php echo esc_attr_x( 'Search for:', 'label', 'vw-construction-estate' ); ?></span>
		<input type="search" class="search-field header-search" placeholder="<?php echo esc_attr_x( 'Search', 'placeholder', 'vw-construction-estate' ); ?>" value="<?php echo esc_attr(get_search_query()) ?>" name="s">
	</label>
	<input type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'vw-construction-estate' ); ?>">
</form>