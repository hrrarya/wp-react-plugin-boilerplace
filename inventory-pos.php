<?php
/*
 * Plugin Name:		Inventory POS
 * Plugin URI:		
 * Description:		
 * Version:			1.00
 * Author:			Hridoy
 * Author URI:		
 * License:			GPL-3.0+
 * License URI:		http://www.gnu.org/licenses/gpl-3.0.txt
 * Author URI:		
 * Text Domain:		hrrr-inventory-pos
 * Domain Path:		/languages
 */

if (!defined('ABSPATH')) {
    exit();
}

if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) {
    require_once dirname(__FILE__) . '/vendor/autoload.php';
}

if (!class_exists('InventoryPOS')) {
    final class InventoryPOS
    {
        private function __construct()
        {
            $this->define_constants();
            register_activation_hook(__FILE__, [$this, 'activate']);
            register_deactivation_hook(__FILE__, [$this, 'deactivate']);
            add_action('init', [$this, 'on_plugins_loaded']);
            add_action('inventory_pos_loaded', [$this, 'init_plugin']);
        }


        public static function init()
        {
            static $instance = false;

            if (!$instance) {
                $instance = new self();
            }

            return $instance;
        }
        public function define_constants()
        {
            /**
             * Defines CONSTANTS for Whole plugins.
             */
            define('INVENTORYPOS_SLUG', 'inventory-pos');
            define('INVENTORYPOS_PLUGIN_ROOT_URI', plugins_url('/', __FILE__));
            define('INVENTORYPOS_ROOT_DIR_PATH', plugin_dir_path(__FILE__));
            define('INVENTORYPOS_ASSETS_DIR_PATH', INVENTORYPOS_ROOT_DIR_PATH . 'assets/');
            define('INVENTORYPOS_ASSETS_URI', INVENTORYPOS_PLUGIN_ROOT_URI . 'assets/');
        }

        public function upload_dir_path()
        {
            // $this->upload_dir = wp_get_upload_dir();
        }


        public function on_plugins_loaded()
        {
            do_action('inventory_pos_loaded');
        }

        /**
         * Initialize the plugin
         *
         * @return void
         */
        public function init_plugin()
        {
            if (is_admin()) {
                new InventoryPos\Admin();
            }
        }


        public function load_textdomain()
        {
            // load_plugin_textdomain('betterlinks', false, dirname(plugin_basename(__FILE__)) . '/languages/');
        }


        public function activate(){}
        public function deactivate()
        {
            // new BetterLinks\Uninstall();
        }
    }
}

/**
 * Initializes the main plugin
 *
 * @return \InventoryPOS
 */
if (!function_exists('InventoryPOS_Start')) {
    function InventoryPOS_Start()
    {
        return InventoryPOS::init();

    }
}

// Plugin Start
InventoryPOS_Start();