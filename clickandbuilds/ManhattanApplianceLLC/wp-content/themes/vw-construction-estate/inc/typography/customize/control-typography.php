<?php
/**
 * Typography control class.
 *
 * @since  1.0.0
 * @access public
 */

class VW_Construction_Estate_Control_Typography extends WP_Customize_Control {

	/**
	 * The type of customize control being rendered.
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $type = 'typography';

	/**
	 * Array 
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $l10n = array();

	/**
	 * Set up our control.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @param  string  $id
	 * @param  array   $args
	 * @return void
	 */
	public function __construct( $manager, $id, $args = array() ) {

		// Let the parent class do its thing.
		parent::__construct( $manager, $id, $args );

		// Make sure we have labels.
		$this->l10n = wp_parse_args(
			$this->l10n,
			array(
				'color'       => esc_html__( 'Font Color', 'vw-construction-estate' ),
				'family'      => esc_html__( 'Font Family', 'vw-construction-estate' ),
				'size'        => esc_html__( 'Font Size',   'vw-construction-estate' ),
				'weight'      => esc_html__( 'Font Weight', 'vw-construction-estate' ),
				'style'       => esc_html__( 'Font Style',  'vw-construction-estate' ),
				'line_height' => esc_html__( 'Line Height', 'vw-construction-estate' ),
				'letter_spacing' => esc_html__( 'Letter Spacing', 'vw-construction-estate' ),
			)
		);
	}

	/**
	 * Enqueue scripts/styles.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue() {
		wp_enqueue_script( 'vw-construction-estate-ctypo-customize-controls' );
		wp_enqueue_style(  'vw-construction-estate-ctypo-customize-controls' );
	}

	/**
	 * Add custom parameters to pass to the JS via JSON.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function to_json() {
		parent::to_json();

		// Loop through each of the settings and set up the data for it.
		foreach ( $this->settings as $setting_key => $setting_id ) {

			$this->json[ $setting_key ] = array(
				'link'  => $this->get_link( $setting_key ),
				'value' => $this->value( $setting_key ),
				'label' => isset( $this->l10n[ $setting_key ] ) ? $this->l10n[ $setting_key ] : ''
			);

			if ( 'family' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_families();

			elseif ( 'weight' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_weight_choices();

			elseif ( 'style' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_style_choices();
		}
	}

	/**
	 * Underscore JS template to handle the control's output.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function content_template() { ?>

		<# if ( data.label ) { #>
			<span class="customize-control-title">{{ data.label }}</span>
		<# } #>

		<# if ( data.description ) { #>
			<span class="description customize-control-description">{{{ data.description }}}</span>
		<# } #>

		<ul>

		<# if ( data.family && data.family.choices ) { #>

			<li class="typography-font-family">

				<# if ( data.family.label ) { #>
					<span class="customize-control-title">{{ data.family.label }}</span>
				<# } #>

				<select {{{ data.family.link }}}>

					<# _.each( data.family.choices, function( label, choice ) { #>
						<option value="{{ choice }}" <# if ( choice === data.family.value ) { #> selected="selected" <# } #>>{{ label }}</option>
					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.weight && data.weight.choices ) { #>

			<li class="typography-font-weight">

				<# if ( data.weight.label ) { #>
					<span class="customize-control-title">{{ data.weight.label }}</span>
				<# } #>

				<select {{{ data.weight.link }}}>

					<# _.each( data.weight.choices, function( label, choice ) { #>

						<option value="{{ choice }}" <# if ( choice === data.weight.value ) { #> selected="selected" <# } #>>{{ label }}</option>

					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.style && data.style.choices ) { #>

			<li class="typography-font-style">

				<# if ( data.style.label ) { #>
					<span class="customize-control-title">{{ data.style.label }}</span>
				<# } #>

				<select {{{ data.style.link }}}>

					<# _.each( data.style.choices, function( label, choice ) { #>

						<option value="{{ choice }}" <# if ( choice === data.style.value ) { #> selected="selected" <# } #>>{{ label }}</option>

					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.size ) { #>

			<li class="typography-font-size">

				<# if ( data.size.label ) { #>
					<span class="customize-control-title">{{ data.size.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.size.link }}} value="{{ data.size.value }}" />

			</li>
		<# } #>

		<# if ( data.line_height ) { #>

			<li class="typography-line-height">

				<# if ( data.line_height.label ) { #>
					<span class="customize-control-title">{{ data.line_height.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.line_height.link }}} value="{{ data.line_height.value }}" />

			</li>
		<# } #>

		<# if ( data.letter_spacing ) { #>

			<li class="typography-letter-spacing">

				<# if ( data.letter_spacing.label ) { #>
					<span class="customize-control-title">{{ data.letter_spacing.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.letter_spacing.link }}} value="{{ data.letter_spacing.value }}" />

			</li>
		<# } #>

		</ul>
	<?php }

	/**
	 * Returns the available fonts.  Fonts should have available weights, styles, and subsets.
	 *
	 * @todo Integrate with Google fonts.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_fonts() { return array(); }

	/**
	 * Returns the available font families.
	 *
	 * @todo Pull families from `get_fonts()`.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	function get_font_families() {

		return array(
			'' => __( 'No Fonts', 'vw-construction-estate' ),
        'Abril Fatface' => __( 'Abril Fatface', 'vw-construction-estate' ),
        'Acme' => __( 'Acme', 'vw-construction-estate' ),
        'Anton' => __( 'Anton', 'vw-construction-estate' ),
        'Architects Daughter' => __( 'Architects Daughter', 'vw-construction-estate' ),
        'Arimo' => __( 'Arimo', 'vw-construction-estate' ),
        'Arsenal' => __( 'Arsenal', 'vw-construction-estate' ),
        'Arvo' => __( 'Arvo', 'vw-construction-estate' ),
        'Alegreya' => __( 'Alegreya', 'vw-construction-estate' ),
        'Alfa Slab One' => __( 'Alfa Slab One', 'vw-construction-estate' ),
        'Averia Serif Libre' => __( 'Averia Serif Libre', 'vw-construction-estate' ),
        'Bangers' => __( 'Bangers', 'vw-construction-estate' ),
        'Boogaloo' => __( 'Boogaloo', 'vw-construction-estate' ),
        'Bad Script' => __( 'Bad Script', 'vw-construction-estate' ),
        'Bitter' => __( 'Bitter', 'vw-construction-estate' ),
        'Bree Serif' => __( 'Bree Serif', 'vw-construction-estate' ),
        'BenchNine' => __( 'BenchNine', 'vw-construction-estate' ),
        'Cabin' => __( 'Cabin', 'vw-construction-estate' ),
        'Cardo' => __( 'Cardo', 'vw-construction-estate' ),
        'Courgette' => __( 'Courgette', 'vw-construction-estate' ),
        'Cherry Swash' => __( 'Cherry Swash', 'vw-construction-estate' ),
        'Cormorant Garamond' => __( 'Cormorant Garamond', 'vw-construction-estate' ),
        'Crimson Text' => __( 'Crimson Text', 'vw-construction-estate' ),
        'Cuprum' => __( 'Cuprum', 'vw-construction-estate' ),
        'Cookie' => __( 'Cookie', 'vw-construction-estate' ),
        'Chewy' => __( 'Chewy', 'vw-construction-estate' ),
        'Days One' => __( 'Days One', 'vw-construction-estate' ),
        'Dosis' => __( 'Dosis', 'vw-construction-estate' ),
        'Droid Sans' => __( 'Droid Sans', 'vw-construction-estate' ),
        'Economica' => __( 'Economica', 'vw-construction-estate' ),
        'Fredoka One' => __( 'Fredoka One', 'vw-construction-estate' ),
        'Fjalla One' => __( 'Fjalla One', 'vw-construction-estate' ),
        'Francois One' => __( 'Francois One', 'vw-construction-estate' ),
        'Frank Ruhl Libre' => __( 'Frank Ruhl Libre', 'vw-construction-estate' ),
        'Gloria Hallelujah' => __( 'Gloria Hallelujah', 'vw-construction-estate' ),
        'Great Vibes' => __( 'Great Vibes', 'vw-construction-estate' ),
        'Handlee' => __( 'Handlee', 'vw-construction-estate' ),
        'Hammersmith One' => __( 'Hammersmith One', 'vw-construction-estate' ),
        'Inconsolata' => __( 'Inconsolata', 'vw-construction-estate' ),
        'Indie Flower' => __( 'Indie Flower', 'vw-construction-estate' ),
        'IM Fell English SC' => __( 'IM Fell English SC', 'vw-construction-estate' ),
        'Julius Sans One' => __( 'Julius Sans One', 'vw-construction-estate' ),
        'Josefin Slab' => __( 'Josefin Slab', 'vw-construction-estate' ),
        'Josefin Sans' => __( 'Josefin Sans', 'vw-construction-estate' ),
        'Kanit' => __( 'Kanit', 'vw-construction-estate' ),
        'Lobster' => __( 'Lobster', 'vw-construction-estate' ),
        'Lato' => __( 'Lato', 'vw-construction-estate' ),
        'Lora' => __( 'Lora', 'vw-construction-estate' ),
        'Libre Baskerville' => __( 'Libre Baskerville', 'vw-construction-estate' ),
        'Lobster Two' => __( 'Lobster Two', 'vw-construction-estate' ),
        'Merriweather' => __( 'Merriweather', 'vw-construction-estate' ),
        'Monda' => __( 'Monda', 'vw-construction-estate' ),
        'Montserrat' => __( 'Montserrat', 'vw-construction-estate' ),
        'Muli' => __( 'Muli', 'vw-construction-estate' ),
        'Marck Script' => __( 'Marck Script', 'vw-construction-estate' ),
        'Noto Serif' => __( 'Noto Serif', 'vw-construction-estate' ),
        'Open Sans' => __( 'Open Sans', 'vw-construction-estate' ),
        'Overpass' => __( 'Overpass', 'vw-construction-estate' ),
        'Overpass Mono' => __( 'Overpass Mono', 'vw-construction-estate' ),
        'Oxygen' => __( 'Oxygen', 'vw-construction-estate' ),
        'Orbitron' => __( 'Orbitron', 'vw-construction-estate' ),
        'Patua One' => __( 'Patua One', 'vw-construction-estate' ),
        'Pacifico' => __( 'Pacifico', 'vw-construction-estate' ),
        'Padauk' => __( 'Padauk', 'vw-construction-estate' ),
        'Playball' => __( 'Playball', 'vw-construction-estate' ),
        'Playfair Display' => __( 'Playfair Display', 'vw-construction-estate' ),
        'PT Sans' => __( 'PT Sans', 'vw-construction-estate' ),
        'Philosopher' => __( 'Philosopher', 'vw-construction-estate' ),
        'Permanent Marker' => __( 'Permanent Marker', 'vw-construction-estate' ),
        'Poiret One' => __( 'Poiret One', 'vw-construction-estate' ),
        'Quicksand' => __( 'Quicksand', 'vw-construction-estate' ),
        'Quattrocento Sans' => __( 'Quattrocento Sans', 'vw-construction-estate' ),
        'Raleway' => __( 'Raleway', 'vw-construction-estate' ),
        'Rubik' => __( 'Rubik', 'vw-construction-estate' ),
        'Rokkitt' => __( 'Rokkitt', 'vw-construction-estate' ),
        'Russo One' => __( 'Russo One', 'vw-construction-estate' ),
        'Righteous' => __( 'Righteous', 'vw-construction-estate' ),
        'Slabo' => __( 'Slabo', 'vw-construction-estate' ),
        'Source Sans Pro' => __( 'Source Sans Pro', 'vw-construction-estate' ),
        'Shadows Into Light Two' => __( 'Shadows Into Light Two', 'vw-construction-estate'),
        'Shadows Into Light' => __( 'Shadows Into Light', 'vw-construction-estate' ),
        'Sacramento' => __( 'Sacramento', 'vw-construction-estate' ),
        'Shrikhand' => __( 'Shrikhand', 'vw-construction-estate' ),
        'Tangerine' => __( 'Tangerine', 'vw-construction-estate' ),
        'Ubuntu' => __( 'Ubuntu', 'vw-construction-estate' ),
        'VT323' => __( 'VT323', 'vw-construction-estate' ),
        'Varela Round' => __( 'Varela Round', 'vw-construction-estate' ),
        'Vampiro One' => __( 'Vampiro One', 'vw-construction-estate' ),
        'Vollkorn' => __( 'Vollkorn', 'vw-construction-estate' ),
        'Volkhov' => __( 'Volkhov', 'vw-construction-estate' ),
        'Yanone Kaffeesatz' => __( 'Yanone Kaffeesatz', 'vw-construction-estate' )
		);
	}

	/**
	 * Returns the available font weights.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_font_weight_choices() {

		return array(
			'' => esc_html__( 'No Fonts weight', 'vw-construction-estate' ),
			'100' => esc_html__( 'Thin',       'vw-construction-estate' ),
			'300' => esc_html__( 'Light',      'vw-construction-estate' ),
			'400' => esc_html__( 'Normal',     'vw-construction-estate' ),
			'500' => esc_html__( 'Medium',     'vw-construction-estate' ),
			'700' => esc_html__( 'Bold',       'vw-construction-estate' ),
			'900' => esc_html__( 'Ultra Bold', 'vw-construction-estate' ),
		);
	}

	/**
	 * Returns the available font styles.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_font_style_choices() {

		return array(
			'normal'  => esc_html__( 'Normal', 'vw-construction-estate' ),
			'italic'  => esc_html__( 'Italic', 'vw-construction-estate' ),
			'oblique' => esc_html__( 'Oblique', 'vw-construction-estate' )
		);
	}
}