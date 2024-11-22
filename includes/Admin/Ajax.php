<?php

namespace ReplaceLinks\Admin;

class Ajax {
    public function __construct() {
        add_action('wp_ajax_hrrr_find_posts_by_link', [$this, 'find_posts_by_link']);
    }

    public function find_posts_by_link() {
        check_ajax_referer( 'replace_links_admin_nonce', 'security' );
		if ( ! current_user_can( 'manage_options' ) ) {
			wp_die( "You don't have permission to do this." );
		}

        $link = isset( $_POST['link'] ) ? sanitize_url( $_POST['link'] ) : null;
        $post_types = isset( $_POST['post_types'] ) ? $_POST['post_types'] : '';

    }
}