<?php

// Featured Image
add_theme_support( 'post-thumbnails' ); 

// Menus
function register_my_menus() {
  register_nav_menus(
	array(
	  'header-menu' => __( 'Header Menu' ),
	  'footer-menu' => __( 'Footer Menu' )
	)
  );
}
add_action( 'init', 'register_my_menus' );

// Logo
add_theme_support( 'custom-logo' );

// Excerpt
add_post_type_support('page', 'excerpt');

// Post Formats
add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'status',
		'audio',
		'chat',
	) );

// Widgets
function rt_widgets() {
	register_sidebar( array(
		'name'          => __( 'Footer Sidebar 1', 'rtcamp' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'rtcamp' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Sidebar 2', 'rtcamp' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'rtcamp' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Sidebar 3', 'rtcamp' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'rtcamp' ),
		'before_widget' => '<ul class="footer-widget-link">',
		'after_widget'  => '</ul>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Sidebar 4', 'rtcamp' ),
		'id'            => 'sidebar-4',
		'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'rtcamp' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'rt_widgets' );

// Soical Custom Widgets

// Register and load the widget
function wpb_load_widget() 
{
    register_widget( 'wpb_widget' );
}
add_action( 'widgets_init', 'wpb_load_widget' );
 
// Creating the widget 
class wpb_widget extends WP_Widget 
{
 
	function __construct() 
	{
		parent::__construct(
	 
		// Base ID of your widget
		'wpb_widget', 
		 
		// Widget name will appear in UI
		__('Social Links', 'wpb_widget_domain'), 
		 
		// Widget description
		array( 'description' => __( 'Social Links', 'wpb_widget_domain' ), ) 
		);
	}
 
	// Creating widget front-end
	public function widget( $args, $instance ) 
	{
		$title = apply_filters( 'widget_title', $instance['title'] );
		$facebook = apply_filters( 'facebook_link', $instance['facebook'] );
		$twitter = apply_filters( 'twitter', $instance['twitter'] );
		$linkedin = apply_filters( 'linkedin', $instance['linkedin'] );
		$rss = apply_filters( 'rss', $instance['rss'] );
	 
		// before and after widget arguments are defined by themes
		echo $args['before_widget'];
		if ( ! empty( $title ) )
		echo $args['before_title'] . $title . $args['after_title'];
	 
		// This is where you run the code and display the output
		if ( ! empty( $facebook ) )
		{
			?>
			<li>
				<div class="social"> <a href="<?php echo $facebook; ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/social/facebook.png" class="socialimg imggrey"> Facebook</a></div>
			</li>
			<?php
		}

		if ( ! empty( $twitter ) )
		{
			?>
			<li>
				<div class="social"> <a href="<?php echo $twitter; ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/social/twitter.png" class="socialimg imggrey"> Twitter</a></div>
			</li>
			<?php
		}

		if ( ! empty( $linkedin ) )
		{
			?>
			<li>
				<div class="social"> <a href="<?php echo $linkedin; ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/social/linkedin.png" class="socialimg imggrey"> Linkedin</a></div>
			</li>
			<?php
		}

		if ( ! empty( $rss ) )
		{
			?>
			<li>
				<div class="social"> <a href="<?php echo $rss; ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/social/rss.png" class="socialimg imggrey"> RSS</a></div>
			</li>
			<?php
		}
		echo $args['after_widget'];
	}
	         
	// Widget Backend 
	public function form( $instance ) 
	{
		if ( isset( $instance[ 'title' ] ) ) 
		{
			$title = $instance[ 'title' ];
		}
		else 
		{
			$title = __( 'New title', 'wpb_widget_domain' );
		}

		if ( isset( $instance[ 'facebook' ] ) ) 
		{
			$facebook = $instance[ 'facebook' ];
		}
		else 
		{
			$facebook = __( 'facebook', 'wpb_widget_domain' );
		}

		if ( isset( $instance[ 'twitter' ] ) ) 
		{
			$twitter = $instance[ 'twitter' ];
		}
		else 
		{
			$twitter = __( 'twitter', 'wpb_widget_domain' );
		}

		if ( isset( $instance[ 'linkedin' ] ) ) 
		{
			$linkedin = $instance[ 'linkedin' ];
		}
		else 
		{
			$linkedin = __( 'linkedin', 'wpb_widget_domain' );
		}

		if ( isset( $instance[ 'rss' ] ) ) 
		{
			$rss = $instance[ 'rss' ];
		}
		else 
		{
			$rss = __( 'rss', 'wpb_widget_domain' );
		}
		// Widget admin form
	?>
	<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
	</p>

	<p>
		<label for="<?php echo $this->get_field_id( 'facebook' ); ?>"><?php _e( 'Facebook:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'facebook' ); ?>" name="<?php echo $this->get_field_name( 'facebook' ); ?>" type="text" value="<?php echo esc_attr( $facebook ); ?>" />
	</p>

	<p>
		<label for="<?php echo $this->get_field_id( 'twitter' ); ?>"><?php _e( 'Twitter:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'twitter' ); ?>" name="<?php echo $this->get_field_name( 'twitter' ); ?>" type="text" value="<?php echo esc_attr( $twitter ); ?>" />
	</p>

	<p>
		<label for="<?php echo $this->get_field_id( 'linkedin' ); ?>"><?php _e( 'Linkedin:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'linkedin' ); ?>" name="<?php echo $this->get_field_name( 'linkedin' ); ?>" type="text" value="<?php echo esc_attr( $linkedin ); ?>" />
	</p>

	<p>
		<label for="<?php echo $this->get_field_id( 'rss' ); ?>"><?php _e( 'RSS:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'rss' ); ?>" name="<?php echo $this->get_field_name( 'rss' ); ?>" type="text" value="<?php echo esc_attr( $rss ); ?>" />
	</p>
<?php 
	}
     
	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) 
	{
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['facebook'] = ( ! empty( $new_instance['facebook'] ) ) ? strip_tags( $new_instance['facebook'] ) : '';
		$instance['twitter'] = ( ! empty( $new_instance['twitter'] ) ) ? strip_tags( $new_instance['twitter'] ) : '';
		$instance['linkedin'] = ( ! empty( $new_instance['linkedin'] ) ) ? strip_tags( $new_instance['linkedin'] ) : '';
		$instance['rss'] = ( ! empty( $new_instance['rss'] ) ) ? strip_tags( $new_instance['rss'] ) : '';
		return $instance;
	}
} // Class wpb_widget ends here
?>