<?php
/**
 * willingness Theme Customizer
 *
 * @package willingness
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function willingness_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	class Willingness_Important_Links extends WP_Customize_Control {

		public $type = "willingness-important-links";

		public function render_content() {
			$important_links = array(
				'documentation' => array(
					'link' => esc_url('http://enwil.com/theme-guide/willingness'),
					'text' => __('Documentation', 'willingness'),
				),
				'upgrade' => array(
					'link' => esc_url('http://enwil.com/themes/willingness-gold/'),
					'text' => __('Upgrade to Gold', 'willingness'),
				),
				'support' => array(
					'link' => esc_url('http://enwil.com/themes/willingness'),
					'text' => __('Support', 'willingness'),
				),
				'demo' => array(
					'link' => esc_url('http://enwil.com/preview/?themedemo=willingness'),
					'text' => __('View Demo', 'willingness'),
				),
				'rating' => array(
					'link' => esc_url('https://wordpress.org/support/view/theme-reviews/willingness'),
					'text' => __('Rate This Theme', 'willingness'),
				)
			);
			foreach ($important_links as $important_link) {
				echo '<p><a target="_blank" href="' . $important_link['link'] . '" >' . esc_attr($important_link['text']) . ' </a></p>';
			}
		}

	}

	$wp_customize->add_section('willingness_important_links', array(
		'priority' => 1000,
		'title'    => __('Willingness Theme Important Links', 'willingness'),
	));

	$wp_customize->add_setting('willingness_important_links', array(
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'willingness_sanitize_link'
	));

	$wp_customize->add_control(new Willingness_Important_Links($wp_customize, 'important_links', array(
		'label'    => __('Important Links', 'willingness'),
		'section'  => 'willingness_important_links',
		'settings' => 'willingness_important_links'
	)));


	/* Theme Options Page to Customizer */

	/* Header Options */
	$wp_customize->add_panel(
		'willingness_header_panel',
		array(
			'title'       => __( 'Header Options', 'willingness' ),
			'description' => __( 'Change header related options', 'willingness' ),
			'priority'    => 500
		)
	);

	$wp_customize->add_section(
		'willingness_header_section',
		array(
			'title'   => __( 'Header Area', 'willingness' ),
			'panel'   => 'willingness_header_panel'
		)
	);

	/* Header Area Disable Setting */
	$wp_customize->add_setting(
		'willingness_header_area',
		array(
			'priority'          => 10,
			'default'           => 0,
			'sanitize_callback' => 'willingness_checkbox_sanitize'
		)
	);

	$wp_customize->add_control(
		'willingness_header_area',
		array(
			'type'      => 'checkbox',
			'label'     => __('Check the Box to Remove the Header Area', 'willingness'),
			'section'   => 'willingness_header_section',
			'settings'  => 'willingness_header_area'
		)
	);
	/* Header Area Disable Setting End */

	/* Header Description Setting */
	$wp_customize->add_setting(
		'willingness_header_description',
		array(
			'priority'          => 20,
			'default'           => 0,
			'sanitize_callback' => 'willingness_checkbox_sanitize'
		)
	);

	$wp_customize->add_control(
		'willingness_header_description',
		array(
			'type'      => 'checkbox',
			'label'     => __('Check the Box to disable site description', 'willingness'),
			'section'   => 'willingness_header_section',
			'settings'  => 'willingness_header_description'
		)
	);

	/* Searchbox Setting */
	$wp_customize->add_setting(
		'willingness_search_box',
		array(
			'priority'          => 30,
			'default'           => 0,
			'sanitize_callback' => 'willingness_checkbox_sanitize'
		)
	);

	$wp_customize->add_control(
		'willingness_search_box',
		array(
			'type'      => 'checkbox',
			'label'     => __('Check the Box to disable search box.', 'willingness'),
			'section'   => 'willingness_header_section',
			'settings'  => 'willingness_search_box'
		)
	);
	/* Header Description Setting End */

	function willingness_checkbox_sanitize($input) {
		if ( $input == 1 ) {
			return 1;
		} else {
			return 0;
		}
	}

	// Sanitize Radio Button
	function willingness_radio_sanitize( $input, $setting ) {
		// Ensure input is a slug.
		$input = sanitize_key( $input );

		// Get list of choices from the control associated with the setting.
		$choices = $setting->manager->get_control( $setting->id )->choices;

		// If the input is a valid key, return it; otherwise, return the default.
		return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
	}

	function willingness_sanitize_link() {
		return false;
	}
}
add_action( 'customize_register', 'willingness_customize_register' );

/**
 * Enqueue scripts for customizer
 */
function willingness_customizer_js() {
   wp_enqueue_script( 'willingness_customizer_script', get_template_directory_uri() . '/js/customizer.js', array("jquery"), 'false', true  );

   wp_localize_script( 'willingness_customizer_script', 'willingness_customizer_obj', array(

      'info' => __( 'Theme Info', 'willingness' ),
      'pro' => __('View Gold version','willingness')

   ) );
}
add_action( 'customize_controls_enqueue_scripts', 'willingness_customizer_js' );