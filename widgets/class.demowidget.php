<?php

class DemoWidget extends WP_Widget {

	public function __construct() {
		parent::__construct(
			'demowidget',
			__( 'Demo Widget', 'demowidget' ),
			array( 'description' => __( 'Our Widget Description', 'demowidget' ) )
		);
	}

	public function form( $instance ) {
		$title     = isset( $instance['title'] ) ? $instance['title'] : __( 'Demo Widget', 'demowidget' );
		$latitude  = isset( $instance['latitude'] ) ? $instance['latitude'] : 23.9;
		$longitude = isset( $instance['longitude'] ) ? $instance['longitude'] : 90.8;
		?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( 'Title', 'demowidget' ) ?></label>
            <input class="widefat" type="text" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
                   name="<?php echo esc_attr( $this->get_field_name( 'title' ) ) ?>"
                   value="<?php echo esc_attr( $title ); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'latitude' ) ); ?>"><?php _e( 'Latitude', 'demowidget' ) ?></label>
            <input class="widefat" type="text" id="<?php echo esc_attr( $this->get_field_id( 'latitude' ) ); ?>"
                   name="<?php echo esc_attr( $this->get_field_name( 'latitude' ) ) ?>"
                   value="<?php echo esc_attr( $latitude ); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'Longitude' ) ); ?>"><?php _e( 'Longitude', 'demowidget' ) ?></label>
            <input class="widefat" type="text" id="<?php echo esc_attr( $this->get_field_id( 'longitude' ) ); ?>"
                   name="<?php echo esc_attr( $this->get_field_name( 'longitude' ) ) ?>"
                   value="<?php echo esc_attr( $longitude ); ?>">
        </p>
		<?php
	}

	public function widget( $args, $instance ) {
		//print_r($args);

		echo $args['before_widget'];
		if ( isset( $instance['title'] ) && $instance['title'] != '' ) {
			echo $args['before_title'];
			echo apply_filters( 'widget_title', $instance['title'] );
			echo $args['after_title'];
			?>
            <div class="demowidget <?php echo esc_attr( $args['id'] ); ?>">
                <p>Latitude: <?php echo isset( $instance['latitude'] ) ? $instance['latitude'] : 'N/A'; ?></p>
                <p>Longitude: <?php echo isset( $instance['longitude'] ) ? $instance['longitude'] : 'N/A'; ?></p>
            </div>
			<?php
		}
		echo $args['after_widget'];

	}

	/*
	public function update() {

	}*/
}

