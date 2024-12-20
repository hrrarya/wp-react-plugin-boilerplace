<?php

namespace MainPlugin\Admin;

class Assets {
    private $pages = ['settings_page_TEXT_DOMAIN'];
    public function __construct() {
        add_action('admin_enqueue_scripts', [$this, 'plugin_scripts']);
    }

    public function plugin_scripts($hook) {
        if( in_array($hook, $this->pages) ){
            $dependencies = include_once CONSTANT_PREFIX_ASSETS_DIR_PATH . 'js/TEXT_DOMAIN.core.min.asset.php';
            wp_enqueue_style('TEXT_DOMAIN-admin', CONSTANT_PREFIX_ASSETS_URI . 'css/TEXT_DOMAIN.css', [], $dependencies['version'], 'all');
            wp_enqueue_script(
                'TEXT_DOMAIN',
                CONSTANT_PREFIX_ASSETS_URI . 'js/TEXT_DOMAIN.core.min.js',
                array_merge($dependencies['dependencies'], ['regenerator-runtime']),
                $dependencies['version'],
                true
            );
        }
    }
}