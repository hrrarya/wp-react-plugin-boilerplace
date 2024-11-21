<?php

namespace InventoryPos\Admin;

class Assets {
    private $pages = ['toplevel_page_inventory-pos'];
    public function __construct() {
        add_action('admin_enqueue_scripts', [$this, 'plugin_scripts']);
    }

    public function plugin_scripts($hook) {
        if( in_array($hook, $this->pages) ){
            $dependencies = include_once INVENTORYPOS_ASSETS_DIR_PATH . 'js/inventory-pos.core.min.asset.php';
            wp_enqueue_script(
                'hrrr-inventory-pos',
                INVENTORYPOS_ASSETS_URI . 'js/inventory-pos.core.min.js',
                array_merge($dependencies['dependencies'], ['regenerator-runtime']),
                $dependencies['version'],
                [
                    'in_footer' => true,
                ]
            );
        }
    }
}