<?php
/**
 * class For Rest API.
 */

class Wkmbsc_Front_Function {

	/**
	 * The single instance of the class.
	 *
	 * @var $instance
	 * @since 1.0.0
	 */
	protected static $instance = null;

	/**
	 * To create rma request.
	 */
	public function wkmbsc_initilize_chat( WP_REST_Request $request ) {
		global $wpdb;
		$table_name = $wpdb->prefix . 'chat_table';

		$data = $request->get_params();

		$sender_id         = $data['sender_id'];
		$receiver_id       = $data['receiver_id'];
		$current_date_time = strtotime( current_datetime()->format( 'Y-m-d H:i:s' ) );
		$message           = $data['message'];

		$sql = $wpdb->insert(
			$table_name,
			array(
				'sender_id'   => $sender_id,
				'receiver_id' => $receiver_id,
				'time_stamp'  => $current_date_time,
				'status'      => 0,
				'message'     => $message,
			),
			array( '%d', '%d', '%d', '%d', '%s' )
		);

		if ( $sql ) {
			return new WP_REST_Response(
				array(
					'Message' => 'Success.',
					'status'  => true,
				),
			);
		} else {
			return new WP_Error(
				'no_data_found',
				'No data Foound',
			);
		}
	}

	/**
	 * To Get Chat history
	 */
	public function wkmbsc_chat_history( WP_REST_Request $request ) {
		global $wpdb;
		$sender_id   = $request->get_param( 'sender_id' );
		$receiver_id = $request->get_param( 'receiver_id' );

		$sql = $wpdb->get_results( $wpdb->prepare( "select * from {$wpdb->prefix}chat_table where sender_id = %d AND receiver_id = %d", array( $sender_id, $receiver_id ) ), ARRAY_A );

		if ( $sql ) {
			return new WP_REST_Response(
				array(
					'Message' => 'Success.',
					'status'  => true,
					'data'    => $sql,
				),
			);
		} else {
			return new WP_Error(
				'no_data_found',
				'No data Foound',
			);
		}

	}



	/**
	 * Main WKMBSC_File_Handler Instance.
	 *
	 * Ensures only one instance of WKMBSC_File_Handler is loaded or can be loaded.
	 *
	 * @return Main instance.
	 * @since 1.0.0
	 * @static
	 */
	public static function get_instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}
		return self::$instance;
	}


}
