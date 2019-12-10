<?php
add_action( 'tgmpa_register', 'event_star_register_required_plugins' );

/**
 * Register the required plugins for this theme.
 *
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 */
function event_star_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
    // Include Acme Demo Setup as recommended
    $plugins = array(
        array(
            'name'      => esc_html__('Acme Demo Setup','event-star'),
            'slug'      => 'acme-demo-setup',
            'required'  => false,
        )
    );
	tgmpa( $plugins );
}