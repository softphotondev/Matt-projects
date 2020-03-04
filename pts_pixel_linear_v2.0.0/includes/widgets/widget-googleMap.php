<?php
/*
Widget Name: Google Map Widget
Plugin URI: http://themeout.com
Description: A simple Facebook Fan Page widget
Version: 1.1
Author: ThemeOut.com
Author URI: http://themeout.com
*/

/**
 * Add function to widgets_init that'll load our widget.
 * @since 0.1
 */
add_action( 'widgets_init', 'google_map_load_widgets' );

/**
 * Register our widget.
 * 'Google_Map_Widget' is the widget class used below.
 *
 * @since 0.1
 */
function google_map_load_widgets() {
	register_widget( 'Google_Map_Widget' );
}

/**
 * Google Map Widget class.
 * This class handles everything that needs to be handled with the widget:
 * the settings, form, display, and update.  Nice!
 *
 * @since 0.1
 */
class Google_Map_Widget extends WP_Widget {

	/**
	 * Widget setup.
	 */
	function __construct() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'widget_googlemap', 'description' => esc_html__('Google Map widget.', 'azkaban_options') );

		/* Widget control settings. */
		$control_ops = array( 'width' => 350, 'height' => 350, 'id_base' => 'googlemap-widget' );

		/* Create the widget. */
		parent::__construct( 'googlemap-widget', esc_html__('Azkaban: Google Map', 'azkaban_options'), $widget_ops, $control_ops );
	}

	/**
	 * How to display the widget on the screen.
	 */
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		$googlemap_api = $instance['googlemap_api'];
		$googlemap_code = $instance['googlemap_code'];
		$googlemap_width = $instance['googlemap_width'];
		$googlemap_height = $instance['googlemap_height'];

		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Display the widget title if one was input (before and after defined by themes). */
		if ( $title )
			echo $before_title . $title . $after_title;

		/* Display the widget title if one was input (before and after defined by themes). */
		if ( $googlemap_code )
			//echo $googlemap_code;

            echo '<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key='.$googlemap_api.'&sensor=false"></script>
<script type="text/javascript" src="http://www.map-generator.org/map/iframejs/'.$googlemap_code.'?key='.$googlemap_api.'&width='.$googlemap_width.'px&height='.$googlemap_height.'px"></script>';
            echo '<div id ="mapid-'.$googlemap_code.'"></div>';

		/* After widget (defined by themes). */
		echo $after_widget;
	}

	/**
	 * Update the widget settings.
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags for title to remove HTML (important for text inputs). */
		$instance['title'] = strip_tags( $new_instance['title'] );
		/* Strip slashes (important for text inputs). */
		$instance['googlemap_api'] = stripslashes( $new_instance['googlemap_api'] );
		$instance['googlemap_code'] = stripslashes( $new_instance['googlemap_code'] );
		$instance['googlemap_width'] = stripslashes( $new_instance['googlemap_width'] );
		$instance['googlemap_height'] = stripslashes( $new_instance['googlemap_height'] );

		return $instance;
	}

	/**
	 * Displays the widget settings controls on the widget panel.
	 * Make use of the get_field_id() and get_field_name() function
	 * when creating your form elements. This handles the confusing stuff.
	 */
	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 'title' => esc_html__('Google Map', 'azkaban_options'), 'googlemap_code' => '' );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p>
		    <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e('Title:', 'azkaban_options'); ?></label>
		    <input id="<?php echo $this->get_field_id( 'title' ); ?>" type="text" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />
		</p>
		<!-- Widget Title: Text Area Input -->
		<p>
		    <label for="<?php echo $this->get_field_id( 'googlemap_api' ); ?>"><?php esc_html_e('Google Map API:', 'azkaban_options'); ?></label>
		    <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'googlemap_api' ); ?>" name="<?php echo $this->get_field_name( 'googlemap_api' ); ?>" value="<?php if( $instance['googlemap_api'] ){ echo esc_attr($instance['googlemap_api']); } ?>" />
		</p>

		<p>
		    <label for="<?php echo $this->get_field_id( 'googlemap_code' ); ?>"><?php esc_html_e('Google Map Code:', 'azkaban_options'); ?></label>
		    <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'googlemap_code' ); ?>" name="<?php echo $this->get_field_name( 'googlemap_code' ); ?>" value="<?php if( $instance['googlemap_code'] ){ echo esc_attr($instance['googlemap_code']); } ?>" />
		</p>

		<p>
		    <label for="<?php echo $this->get_field_id( 'googlemap_width' ); ?>"><?php esc_html_e('Google Map Width:', 'azkaban_options'); ?></label>
		    <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'googlemap_width' ); ?>" name="<?php echo $this->get_field_name( 'googlemap_width' ); ?>" value="<?php if( $instance['googlemap_width'] ){ echo esc_attr($instance['googlemap_width']); } ?>" />
		</p>

		<p>
		    <label for="<?php echo $this->get_field_id( 'googlemap_height' ); ?>"><?php esc_html_e('Google Map Height:', 'azkaban_options'); ?></label>
		    <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'googlemap_height' ); ?>" name="<?php echo $this->get_field_name( 'googlemap_height' ); ?>" value="<?php if( $instance['googlemap_height'] ){ echo esc_attr($instance['googlemap_height']); } ?>" />
		</p>


<?php
	}
}

