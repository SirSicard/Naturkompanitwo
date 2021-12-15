<?php
function ajax_fb_auth_init() {
    wp_register_script('ajax-fb-auth', get_template_directory_uri() . '/js/ajax-auth-script.js', array('jquery') );

    wp_enqueue_script('ajax-fb-auth');

    wp_localize_script('ajax-fb-auth', 'ajax_fb_auth_object', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'redirecturl'   => home_url(),
    ));

    add_action('wp_ajax_nopriv_ajax_fb_login', 'ajax_fb_login');
}
// check is user is NOT logged in
if ( ! is_user_logged_in() ) {
    add_action('init', 'ajax_fb_auth_init');
}
// Get data from POST request
function ajax_fb_login() {
    check_ajax_referer( 'ajax-login-nonce', 'security' );

    fb_auth_login($_POST['email'], $_POST['auth_token']);

    die();
}

function fb_auth_login($user_email, $auth_token) {
    check_ajax_referer( 'ajax-login-nonce', 'security' );
    // $data = array();
    // $data['email'] = $user_email;
    // $data['auth_token'] = $auth_token;


    $user = get_user_by('email', $user_email);

    // Check if user exists
    if ( ! is_wp_error( $user ) ) {
        // If user exists
        wp_clear_auth_cookie();
        wp_set_current_user ( $user->ID );
        wp_set_auth_cookie ( $user->ID );
    }   else    {
        // echo "ERROR!!!11";
        exit();
    }
exit();
}