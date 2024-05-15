<?php

/**
 * Handles 'boxdl' custom field type.
 */
class CMB2_Render_boxdl_Field extends CMB2_Type_Base {

	/**
	 * List of states. To translate, pass array of states in the 'state_list' field param.
	 *
	 * @var array
	 */
	

	public static function init() {
		add_filter( 'cmb2_render_class_boxdl', array( __CLASS__, 'class_name' ) );
		add_filter( 'cmb2_sanitize_boxdl', array( __CLASS__, 'maybe_save_split_values' ), 12, 4 );

		/**
		 * The following snippets are required for allowing the boxdl field
		 * to work as a repeatable field, or in a repeatable group.
		 */
		add_filter( 'cmb2_sanitize_boxdl', array( __CLASS__, 'sanitize' ), 10, 5 );
		add_filter( 'cmb2_types_esc_boxdl', array( __CLASS__, 'escape' ), 10, 4 );
		add_filter( 'cmb2_override_meta_value', array( __CLASS__, 'get_split_meta_value' ), 12, 4 );
	}

	public static function class_name() { return __CLASS__; }

	/**
	 * Handles outputting the boxdl field.
	 */
	public function render() {

		// make sure we assign each part of the value we need.
		$value = wp_parse_args( $this->field->escaped_value(), array(
			'title_online' => '',
			'link_online' => '',
			'title_woo' => '',
                  'btn_eins' => '',
                  'btn_zwei' => '',
                  'btn_drei' => '',
                  'link_eins' => '',
                  'link_zwei' => '',
                  'link_drei' => '',
		) );
		ob_start();
		// Do html.
		?>
            <div><p><label for="<?php echo $this->_id( '_title_woo_', false ); ?>'"><?php echo esc_html( $this->_text( 'download_title_woo__text', 'عنوان قسمت' ) ); ?></label></p>
			<?php echo $this->types->input( array(
				'name'  => $this->_name( '[title_woo]' ),
				'id'    => $this->_id( '_title_woo_' ),
				'value' => $value['title_woo'],
				'desc'  => '',
			) ); ?>
		</div>

            <div><p><label for="<?php echo $this->_id( '_btn_eins_', false ); ?>"><?php echo esc_html( $this->_text( 'download_title__text', 'عنوان دکمه اول' ) ); ?></label></p>
			<?php echo $this->types->input( array(
				'name'  => $this->_name( '[btn_eins]' ),
				'id'    => $this->_id( '_btn_eins_' ),
				'value' => $value['btn_eins'],
				'desc'  => '',
			) ); ?>
		</div>
		<div><p><label for="<?php echo $this->_id( '_link_eins_', false ); ?>'"><?php echo esc_html( $this->_text( 'download_link__text', 'لینک دکمه اول' ) ); ?></label></p>
			<?php echo $this->types->input( array(
				'name'  => $this->_name( '[link_eins]' ),
				'id'    => $this->_id( '_link_eins_' ),
				'value' => $value['link_eins'],
				'desc'  => '',
			) ); ?>
		</div>

            <div><p><label for="<?php echo $this->_id( '_btn_zwei_', false ); ?>"><?php echo esc_html( $this->_text( 'download_title__text', 'عنوان دکمه دوم' ) ); ?></label></p>
			<?php echo $this->types->input( array(
				'name'  => $this->_name( '[btn_zwei]' ),
				'id'    => $this->_id( '_btn_zwei_' ),
				'value' => $value['btn_zwei'],
				'desc'  => '',
			) ); ?>
		</div>
		<div><p><label for="<?php echo $this->_id( '_link_zwei_', false ); ?>'"><?php echo esc_html( $this->_text( 'download_link__text', 'لینک دکمه دوم' ) ); ?></label></p>
			<?php echo $this->types->input( array(
				'name'  => $this->_name( '[link_zwei]' ),
				'id'    => $this->_id( '_link_zwei_' ),
				'value' => $value['link_zwei'],
				'desc'  => '',
			) ); ?>
		</div>

            <div><p><label for="<?php echo $this->_id( '_btn_drei_', false ); ?>"><?php echo esc_html( $this->_text( 'download_title__text', 'عنوان دکمه سوم' ) ); ?></label></p>
			<?php echo $this->types->input( array(
				'name'  => $this->_name( '[btn_drei]' ),
				'id'    => $this->_id( '_btn_drei_' ),
				'value' => $value['btn_drei'],
				'desc'  => '',
			) ); ?>
		</div>
		<div><p><label for="<?php echo $this->_id( '_link_drei_', false ); ?>'"><?php echo esc_html( $this->_text( 'download_link__text', 'لینک دکمه سوم' ) ); ?></label></p>
			<?php echo $this->types->input( array(
				'name'  => $this->_name( '[link_drei]' ),
				'id'    => $this->_id( '_link_drei_' ),
				'value' => $value['link_drei'],
				'desc'  => '',
			) ); ?>
		</div>

		<div><p><label for="<?php echo $this->_id( '_title_online_', false ); ?>"><?php echo esc_html( $this->_text( 'download_title__text', 'عنوان دکمه پخش آنلاین' ) ); ?></label></p>
			<?php echo $this->types->input( array(
				'name'  => $this->_name( '[title_online]' ),
				'id'    => $this->_id( '_title_online_' ),
				'value' => $value['title_online'],
				'desc'  => '',
			) ); ?>
		</div>
		<div><p><label for="<?php echo $this->_id( '_link_online_', false ); ?>'"><?php echo esc_html( $this->_text( 'download_link__text', 'لینک دکمه پخش آنلاین' ) ); ?></label></p>
			<?php echo $this->types->input( array(
				'name'  => $this->_name( '[link_online]' ),
				'id'    => $this->_id( '_link_online_' ),
				'value' => $value['link_online'],
				'desc'  => '',
			) ); ?>
		</div>
		

		
		<p class="clear">
			<?php echo $this->_desc();?>
		</p>
		<?php

		// grab the data from the output buffer.
		return $this->rendered( ob_get_clean() );
	}

	/**
	 * Optionally save the boxdl values into separate fields
	 */
	public static function maybe_save_split_values( $override_value, $value, $object_id, $field_args ) {
		if ( ! isset( $field_args['split_values'] ) || ! $field_args['split_values'] ) {
			// Don't do the override.
			return $override_value;
		}

		$boxdl_keys = array( 'title', 'link', 'city', 'state', 'zip' );

		foreach ( $boxdl_keys as $key ) {
			if ( ! empty( $value[ $key ] ) ) {
				update_post_meta( $object_id, $field_args['id'] . 'addr_' . $key, sanitize_text_field( $value[ $key ] ) );
			}
		}

		remove_filter( 'cmb2_sanitize_boxdl', array( __CLASS__, 'sanitize' ), 10, 5 );

		// Tell CMB2 we already did the update.
		return true;
	}

	public static function sanitize( $check, $meta_value, $object_id, $field_args, $sanitize_object ) {

		// if not repeatable, bail out.
		if ( ! is_array( $meta_value ) || ! $field_args['repeatable'] ) {
			return $check;
		}

		foreach ( $meta_value as $key => $val ) {
			$meta_value[ $key ] = array_filter( array_map( 'sanitize_text_field', $val ) );
		}

		return array_filter( $meta_value );
	}

	public static function escape( $check, $meta_value, $field_args, $field_object ) {
		// if not repeatable, bail out.
		if ( ! is_array( $meta_value ) || ! $field_args['repeatable'] ) {
			return $check;
		}

		foreach ( $meta_value as $key => $val ) {
			$meta_value[ $key ] = array_filter( array_map( 'esc_attr', $val ) );
		}

		return array_filter( $meta_value );
	}

	public static function get_split_meta_value( $data, $object_id, $field_args, $field ) {
		if ( 'boxdl' !== $field->args['type'] ) {
			return $data;
		}
		if ( ! isset( $field->args['split_values'] ) || ! $field->args['split_values'] ) {
			// Don't do the override.
			return $data;
		}

		$prefix = $field->args['id'] . 'addr_';
		// Construct an array to iterate to fetch individual meta values for our override.
		// Should match the values in the render() method.
		$metakeys = array(
			'title_online',
			'link_online',
			'title_woo',
                  'btn_eins',
                  'btn_zwei',
                  'btn_drei',
                  'link_eins',
                  'link_zwei',
                  'link_drei',
		);

		$newdata = array();
		foreach ( $metakeys as $metakey ) {
			// Use our prefix to construct the whole meta key from the postmeta table.
			$newdata[ $metakey ] = get_post_meta( $object_id, $prefix . $metakey, true );
		}

		return $newdata;
	}
}