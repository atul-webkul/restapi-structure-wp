<?php
/**
 * Route Handler
 */
class Wkmbsc_Route_Handler {

	/**
	 * The single instance of the class.
	 *
	 * @var $instance
	 * @since 1.0.0
	 */
	protected static $instance = null;

	public function wkmbsc_restapi_init() {

		$function_handler = Wkmbsc_Front_Function::get_instance();

		// To Initilize chat
		register_rest_route(
			'mobikul/v1',
			'/initilize-chat/',
			array(
				'methods'             => WP_REST_Server::CREATABLE,
				'callback'            => array( $function_handler, 'wkmbsc_initilize_chat' ),
				'permission_callback' => function () {
					return true;
				},
				'args'                => array(
					'sender_id'   => array(
						'required' => true,
					),
					'receiver_id' => array(
						'required' => true,
					),
					'message'     => array(
						'required' => true,
					),
				),
			)
		);

		// To Get chat history
		register_rest_route(
			'mobikul/v1',
			'/get-chat-history/',
			array(
				'methods'             => WP_REST_Server::READABLE,
				'callback'            => array( $function_handler, 'wkmbsc_chat_history' ),
				'permission_callback' => function () {
						return true;
				},
				'args'                => array(
					'sender_id'   => array(
						'required' => true,
					),
					'receiver_id' => array(
						'required' => true,
					),
				),
			)
		);

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
