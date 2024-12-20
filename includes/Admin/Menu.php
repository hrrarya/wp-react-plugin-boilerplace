<?php

namespace MainPlugin\Admin;

class Menu {
    /**
	 * add plugin menu page and submenu pages
	 */
	public function __construct()
	{
		add_action('admin_menu', [$this, 'admin_menu']);
	}

	/**
	 * add admin menu page
	 * @return hooks
	 */
	public function admin_menu()
	{
		add_submenu_page( 
			'options-general.php', 'PLUGIN_NAME', 'PLUGIN_NAME', 'manage_options', 'TEXT_DOMAIN', array(&$this, 'load_main_template')
		);
	}
	public function load_main_template()
	{
		echo '<div id="TEXT_DOMAIN-body" class="TEXT_DOMAIN-body"></div>';
	}
}