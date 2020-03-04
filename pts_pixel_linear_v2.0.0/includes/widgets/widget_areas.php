<?php 
/**
 * @package WordPress
 * @subpackage azkaban
 */

global $azkaban_options;

/* Register Default Widget Areas */
if ( function_exists('register_sidebar') ) {   
	register_sidebar(array(	
		'name' => __('Default Sidebar','azkaban_options'),	
        'id' => 'azkaban-default-sidebar',
		'before_widget' => '<div id="%1$s" class="az-sidebarsection %2$s">',	
		'after_widget' => '</div>',	
        'before_title' => '<h2 class="az-sidebarsectiontitle"><span>',
        'after_title' => '</span></h2>',
	));
}


/* Register Contact Page Widget Areas */
if ( function_exists('register_sidebar') ) {   
	register_sidebar(array(	
		'name' => __('Contact Sidebar','azkaban_options'),	
        'id' => 'azkaban-contact-sidebar',
		'before_widget' => '<div id="%1$s" class="az-sidebarsection %2$s">',	
		'after_widget' => '</div>',	
        'before_title' => '<h2 class="az-sidebarsectiontitle"><span>',
        'after_title' => '</span></h2>',
	));
}

if ( function_exists('register_sidebar') ) {   
	register_sidebar(array(	
		'name' => __('Footer Column 1','azkaban_options'),
		'id' => 'footer-col1',
		'before_widget' => '<div id="%1$s" class="az-footerwidgetsection %2$s">',	
		'after_widget' => '</div>',	
        'before_title' => '<h2 class="widget_title"><span>',
        'after_title' => '</span></h2>',
	));
}

if ( function_exists('register_sidebar') ) {   
	register_sidebar(array(	
		'name' => __('Footer Column 2','azkaban_options'),
		'id' => 'footer-col2',
		'before_widget' => '<div id="%1$s" class="az-footerwidgetsection %2$s">',	
		'after_widget' => '</div>',	
        'before_title' => '<h2 class="widget_title"><span>',
        'after_title' => '</span></h2>',
	));

}

if ( function_exists('register_sidebar') ) {   
	register_sidebar(array(	
		'name' => __('Footer Column 3','azkaban_options'),
		'id' => 'footer-col3',
		'before_widget' => '<div id="%1$s" class="az-footerwidgetsection %2$s">',
		'after_widget' => '</div>',	
        'before_title' => '<h2 class="widget_title"><span>',
        'after_title' => '</span></h2>',
	));
}

if( is_array($azkaban_options) ){
	if( $azkaban_options['footer_widgets_layout'] == 1 || $azkaban_options['footer_widgets_layout'] == 2 ) {
		if ( function_exists('register_sidebar') ) {   
			register_sidebar(array(	
				'name' => __('Footer Column 4','azkaban_options'),
				'id' => 'footer-col4',
				'before_widget' => '<div id="%1$s" class="az-footerwidgetsection %2$s">',	
				'after_widget' => '</div>',	
				'before_title' => '<h2 class="widget_title"><span>',
				'after_title' => '</span></h2>',
			));
		}
	}
}