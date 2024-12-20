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
			'options-general.php', 'Main Plugin', 'Main Plugin', 'manage_options', 'main-plugin', array(&$this, 'load_main_template')
		);
	}
	public function load_main_template()
	{
		echo '<div id="main-plugin-body" class="main-plugin-body"></div>';
	}
}