<?php

namespace ReplaceLinks\Admin;

class Assets {
    private $pages = ['settings_page_hrrr-replace-links'];
    public function __construct() {
        add_action('admin_enqueue_scripts', [$this, 'plugin_scripts']);
    }

    public function plugin_scripts($hook) {
        if( in_array($hook, $this->pages) ){
            $dependencies = include_once REPLACELINKS_ASSETS_DIR_PATH . 'js/replace-links.core.min.asset.php';
            wp_enqueue_style('hrrr-replace-links-admin', REPLACELINKS_ASSETS_URI . 'css/replace-links.css', [], $dependencies['version'], 'all');
            wp_enqueue_script(
                'hrrr-replace-links',
                REPLACELINKS_ASSETS_URI . 'js/replace-links.core.min.js',
                array_merge($dependencies['dependencies'], ['regenerator-runtime']),
                $dependencies['version'],
                true
            );
        }
    }
}