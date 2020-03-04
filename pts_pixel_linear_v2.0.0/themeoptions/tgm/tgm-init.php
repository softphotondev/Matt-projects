<?php

/**
 * TGM Init Class
 */
get_template_part('themeoptions/tgm/class-tgm-plugin-activation');

function pixel_linear_register_required_plugins() {

	$plugins = array(
		array(
			'name' 	   => 'Redux Framework',
			'slug' 	   => 'azkaban_options',
			'required' => false,
		),
	);

	$config = array(
		'domain'       		=> 'azkaban_options',         	// Text domain - likely want to be the same as your theme.
		'default_path' 		=> '',                         	// Default absolute path to pre-packaged plugins
		//'parent_menu_slug' 	=> 'plugins.php', 				// Default parent menu slug
		//'parent_url_slug' 	=> 'plugins.php', 				// Default parent URL slug
                'parent_slug'           => 'plugins.php',
                'capability'            => 'manage_options',
		'menu'         		=> 'install-required-plugins', 	// Menu slug
		'has_notices'      	=> false,                       	// Show admin notices or not
		'is_automatic'    	=> true,					   	// Automatically activate plugins after installation or not
	);

	tgmpa( $plugins, $config );

}
add_action( 'tgmpa_register', 'pixel_linear_register_required_plugins' );