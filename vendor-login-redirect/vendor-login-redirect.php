<?php
/*
Plugin Name: Vendor Login Redirect
Description: This plugin creates a custom login redirect for <strong>vendor</strong> users role.
Version: 1.0
Author: Francisco Garay
Author URI: http://franciscogaray.ga/
License GPLv2 or later
Text Domain: vendor-login-redirect
*/

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! function_exists('franciscogaray_vendor_login_redirect') ) {
    function franciscogaray_vendor_login_redirect( $redirect_to, $request, $user ) {
        global $user;
        if ( isset( $user->roles ) && is_array( $user->roles ) ) {
            if ( in_array( 'vendor', $user->roles ) ) {
                $redirect_to = '/mi-cuenta/';
                return $redirect_to;
            } else {
                return home_url();
            }
        } else {
            return home_url();
        }
    }
    add_filter( 'login_redirect', 'franciscogaray_vendor_login_redirect', 10, 3 );
} else {
    // do nothing
}