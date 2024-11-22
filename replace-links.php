<?php
/*
 * Plugin Name:		Replace Links
 * Plugin URI:		
 * Description:		Replace your existing broken links in posts & pages in a better way.
 * Version:			1.00
 * Author:			Hridoy
 * Author URI:		
 * License:			GPL-3.0+
 * License URI:		http://www.gnu.org/licenses/gpl-3.0.txt
 * Author URI:		
 * Text Domain:		hrrr-replace-links
 * Domain Path:		/languages
 */

if (!defined('ABSPATH')) {
    exit();
}

if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) {
    require_once dirname(__FILE__) . '/vendor/autoload.php';
}

if (!class_exists('ReplaceLinks')) {
    final class ReplaceLinks
    {
        private function __construct()
        {
            $this->define_constants();
            register_activation_hook(__FILE__, [$this, 'activate']);
            register_deactivation_hook(__FILE__, [$this, 'deactivate']);
            add_action('init', [$this, 'on_plugins_loaded']);
            add_action('replace_links_loaded', [$this, 'init_plugin']);
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
            define('REPLACELINKS_SLUG', 'inventory-pos');
            define('REPLACELINKS_PLUGIN_ROOT_URI', plugins_url('/', __FILE__));
            define('REPLACELINKS_ROOT_DIR_PATH', plugin_dir_path(__FILE__));
            define('REPLACELINKS_ASSETS_DIR_PATH', REPLACELINKS_ROOT_DIR_PATH . 'assets/');
            define('REPLACELINKS_ASSETS_URI', REPLACELINKS_PLUGIN_ROOT_URI . 'assets/');
        }

        public function upload_dir_path()
        {
            // $this->upload_dir = wp_get_upload_dir();
        }


        public function on_plugins_loaded()
        {
            do_action('replace_links_loaded');
        }

        /**
         * Initialize the plugin
         *
         * @return void
         */
        public function init_plugin()
        {
            if (is_admin()) {
                new ReplaceLinks\Admin();
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
 * @return \ReplaceLinks
 */
if (!function_exists('ReplaceLinks_Start')) {
    function ReplaceLinks_Start()
    {
        return ReplaceLinks::init();

    }
}

// Plugin Start
ReplaceLinks_Start();