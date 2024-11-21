<?php

namespace InventoryPos\Admin;

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
		add_menu_page(
			'Inventory & POS',
			'Inventory & POS',
			// 'access_inventory_pos',
			'manage_options',
			INVENTORYPOS_SLUG,
			[$this, 'load_main_template'],
			'dashicons-store',
			30
		);
	}
	public function load_main_template()
	{
		echo '<div id="inventoryposbody" class="inventorypos-body"></div>';
	}
}