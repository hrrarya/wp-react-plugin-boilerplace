<?php

namespace ReplaceLinks\Admin;

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
			'options-general.php', 'Replace Links', 'Replace Links', 'manage_options', 'hrrr-replace-links', array(&$this, 'load_main_template')
		);
	}
	public function load_main_template()
	{
		echo '<div id="hrrr-replacelinks-body" class="hrrr-replace-links-body"></div>';
	}
}