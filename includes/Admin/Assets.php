<?php

namespace MainPlugin\Admin;

class Assets {
    private $pages = ['settings_page_main-plugin'];
    public function __construct() {
        add_action('admin_enqueue_scripts', [$this, 'plugin_scripts']);
    }

    public function plugin_scripts($hook) {
        if( in_array($hook, $this->pages) ){
            $dependencies = include_once REPLACELINKS_ASSETS_DIR_PATH . 'js/main-plugin.core.min.asset.php';
            wp_enqueue_style('main-plugin-admin', REPLACELINKS_ASSETS_URI . 'css/main-plugin.css', [], $dependencies['version'], 'all');
            wp_enqueue_script(
                'main-plugin',
                REPLACELINKS_ASSETS_URI . 'js/main-plugin.core.min.js',
                array_merge($dependencies['dependencies'], ['regenerator-runtime']),
                $dependencies['version'],
                true
            );
        }
    }
}