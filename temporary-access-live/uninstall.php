<?php
defined( 'ABSPATH' ) || exit;

$users = get_users( array( 'meta_key' => '_tal_worker', 'meta_value' => '1', 'fields' => 'ID' ) );
foreach ( $users as $id ) {
	WP_Session_Tokens::get_instance( (int) $id )->destroy_all();
	$user = new WP_User( $id );
	$user->set_role( '' );
	wp_set_password( wp_generate_password( 64, true, true ), $id );
}
wp_clear_scheduled_hook( 'tal_cleanup' );
