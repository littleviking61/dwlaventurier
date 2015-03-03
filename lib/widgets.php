<?php
/**
 * Register sidebars and widgets
 */
function dw_timeline_widgets_init() {
  // Sidebars
  register_sidebar(array(
    'name'          => __('primary', 'dw-timeline'),
    'id'            => 'sidebar-primary',
    'before_widget' => '<section class="widget %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ));

  // dw_about_widget
  register_widget( 'dw_timeline_about' );
}
add_action('widgets_init', 'dw_timeline_widgets_init');

/**
 * Adds dw_timeline_about widget.
 */
class dw_timeline_about extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'dw_timeline_about', // Base ID
			__('DW Timline: About', 'dw_timeline'), // Name
			array( 'description' => '', ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		$avatar = $instance['avatar'];
		$description = $instance['description'];
		$facebook = $instance['facebook'];
		$twitter = $instance['twitter'];
		$google_plus = $instance['google_plus'];
		$youtube = $instance['youtube'];
		$linkedin = $instance['linkedin'];
		$instagram = $instance['instagram'];
		$tumblr = $instance['tumblr'];
		$custom = $instance['custom'];

		echo $args['before_widget'];
		?>
		<div class="widget-about">
			<div class="text-center"><img class="avatar img-circle" src="<?php echo $avatar ?>" alt=""></div>

			<p class="description text-center"><?php echo $description ?></p>

			<ul class="share list-inline text-center">
				<?php if ($facebook): ?>
					<li class="facebook"><a target="other" href="<?php echo $facebook ?>"><i class="fa fa-facebook"></i></a></li>
				<?php endif ?>

				<?php if ($twitter): ?>
					<li class="twitter"><a target="other" href="<?php echo $twitter ?>"><i class="fa fa-twitter"></i></a></li>
				<?php endif ?>

				<?php if ($google_plus): ?>
					<li class="google-plus"><a target="other" href="<?php echo $google_plus ?>"><i class="fa fa-google-plus"></i></a></li>
				<?php endif ?>

				<?php if ($youtube): ?>
					<li class="youtube"><a target="other" href="<?php echo $youtube ?>"><i class="fa fa-youtube"></i></a></li> 
				<?php endif ?>

				<?php if ($linkedin): ?>
					<li class="linkedin"><a target="other" href="<?php echo $linkedin ?>"><i class="fa fa-linkedin"></i></a></li>
				<?php endif ?>

				<?php if ($instagram): ?>
					<li class="instagram"><a target="other" href="<?php echo $instagram ?>"><i class="fa fa-instagram"></i></a></li>
				<?php endif ?>

				<?php if ($tumblr): ?>
					<li class="tumblr"><a target="other" href="<?php echo $tumblr ?>"><i class="fa fa-tumblr"></i></a></li>
				<?php endif ?>

				<?php if ($custom): ?>
					<?php echo $custom; ?>
				<?php endif ?>
			</ul>
		</div>
		<?php
		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		if ( isset( $instance[ 'avatar' ] ) ) { $avatar = $instance[ 'avatar' ]; }
		if ( isset( $instance[ 'description' ] ) ) { $description = $instance[ 'description' ]; }
		if ( isset( $instance[ 'facebook' ] ) ) { $facebook = $instance[ 'facebook' ]; }
		if ( isset( $instance[ 'twitter' ] ) ) { $twitter = $instance[ 'twitter' ]; }
		if ( isset( $instance[ 'google_plus' ] ) ) { $google_plus = $instance[ 'google_plus' ]; }
		if ( isset( $instance[ 'youtube' ] ) ) { $youtube = $instance[ 'youtube' ]; }
		if ( isset( $instance[ 'linkedin' ] ) ) { $linkedin = $instance[ 'linkedin' ]; }
		if ( isset( $instance[ 'instagram' ] ) ) { $instagram = $instance[ 'instagram' ]; }
		if ( isset( $instance[ 'tumblr' ] ) ) { $tumblr = $instance[ 'tumblr' ]; }
		if ( isset( $instance[ 'custom' ] ) ) { $custom = $instance[ 'custom' ]; }
		?>

		<p style="text-align: right">
			<a style="text-decoration: none" target="_blank" title="<?php _e('Helps','dw-timline') ?>" href="http://www.designwall.com/guide/dw-timeline-pro/#dw_timeline_about_widget">
				<span data-code="f223" class="dashicons dashicons-editor-help"></span>
			</a> 
		</p>

		<p>
		<label for="<?php echo $this->get_field_id( 'avatar' ); ?>"><?php _e( 'Avatar:', 'dw_timeline' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'avatar' ); ?>" name="<?php echo $this->get_field_name( 'avatar' ); ?>" type="text" value="<?php echo esc_attr( $avatar ); ?>" placeholder="Enter link to avatar here">
		</p>

		<p>
		<label for="<?php echo $this->get_field_id( 'description' ); ?>"><?php _e( 'Description:', 'dw_timeline' ); ?></label>
		<textarea class="widefat" id="<?php echo $this->get_field_id( 'description' ); ?>" name="<?php echo $this->get_field_name( 'description' ); ?>" rows="10"><?php echo esc_html( $description ); ?></textarea>
		</p>
		
		<p>
		<label for="<?php echo $this->get_field_id( 'facebook' ); ?>"><?php _e( 'Facebook:', 'dw_timeline' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'facebook' ); ?>" name="<?php echo $this->get_field_name( 'facebook' ); ?>" type="text" value="<?php echo esc_attr( $facebook ); ?>">
		</p>

		<p>
		<label for="<?php echo $this->get_field_id( 'twitter' ); ?>"><?php _e( 'Twitter:', 'dw_timeline' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'twitter' ); ?>" name="<?php echo $this->get_field_name( 'twitter' ); ?>" type="text" value="<?php echo esc_attr( $twitter ); ?>">
		</p>

		<p>
		<label for="<?php echo $this->get_field_id( 'google_plus' ); ?>"><?php _e( 'Google plus:', 'dw_timeline' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'google_plus' ); ?>" name="<?php echo $this->get_field_name( 'google_plus' ); ?>" type="text" value="<?php echo esc_attr( $google_plus ); ?>">
		</p>

		<p>
		<label for="<?php echo $this->get_field_id( 'youtube' ); ?>"><?php _e( 'Youtube:', 'dw_timeline' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'youtube' ); ?>" name="<?php echo $this->get_field_name( 'youtube' ); ?>" type="text" value="<?php echo esc_attr( $youtube ); ?>">
		</p>

		<p>
		<label for="<?php echo $this->get_field_id( 'linkedin' ); ?>"><?php _e( 'Linkedin:', 'dw_timeline' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'linkedin' ); ?>" name="<?php echo $this->get_field_name( 'linkedin' ); ?>" type="text" value="<?php echo esc_attr( $linkedin ); ?>">
		</p>

		<p>
		<label for="<?php echo $this->get_field_id( 'instagram' ); ?>"><?php _e( 'Instagram:', 'dw_timeline' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'instagram' ); ?>" name="<?php echo $this->get_field_name( 'instagram' ); ?>" type="text" value="<?php echo esc_attr( $instagram ); ?>">
		</p>

		<p>
		<label for="<?php echo $this->get_field_id( 'tumblr' ); ?>"><?php _e( 'Tumblr:', 'dw_timeline' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'tumblr' ); ?>" name="<?php echo $this->get_field_name( 'tumblr' ); ?>" type="text" value="<?php echo esc_attr( $tumblr ); ?>">
		</p>

		<p>
		<label for="<?php echo $this->get_field_id( 'custom' ); ?>"><?php _e( 'Other links:', 'dw_timeline' ); ?></label> 
		<textarea class="widefat" id="<?php echo $this->get_field_id( 'custom' ); ?>" name="<?php echo $this->get_field_name( 'custom' ); ?>" rows="5"><?php echo esc_html( $custom  ) ?></textarea>
		</p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['avatar'] = ( ! empty( $new_instance['avatar'] ) ) ? strip_tags( $new_instance['avatar'] ) : '';
		$instance['description'] = ( ! empty( $new_instance['description'] ) ) ? $new_instance['description'] : '';
		$instance['facebook'] = ( ! empty( $new_instance['facebook'] ) ) ? strip_tags( $new_instance['facebook'] ) : '';
		$instance['twitter'] = ( ! empty( $new_instance['twitter'] ) ) ? strip_tags( $new_instance['twitter'] ) : '';
		$instance['google_plus'] = ( ! empty( $new_instance['google_plus'] ) ) ? strip_tags( $new_instance['google_plus'] ) : '';
		$instance['youtube'] = ( ! empty( $new_instance['youtube'] ) ) ? strip_tags( $new_instance['youtube'] ) : '';
		$instance['linkedin'] = ( ! empty( $new_instance['linkedin'] ) ) ? strip_tags( $new_instance['linkedin'] ) : '';
		$instance['instagram'] = ( ! empty( $new_instance['instagram'] ) ) ? strip_tags( $new_instance['instagram'] ) : '';
		$instance['tumblr'] = ( ! empty( $new_instance['tumblr'] ) ) ? strip_tags( $new_instance['tumblr'] ) : '';
		$instance['custom'] = ( ! empty( $new_instance['custom'] ) ) ?  $new_instance['custom'] : '';

		return $instance;
	}

}