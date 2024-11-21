<?php
namespace InventoryPos\Admin;

class Role {
    public function __construct()
    {
        $this->custom_user_roles();
        // add_action('admin_menu', [$this, 'restrict_menu_by_role']);
    }

    public function restrict_menu_by_role() {
        global $menu;

        foreach( $menu as $i => $item ){
            
            if( !current_user_can('manage_woocommerce') ){
                
            }
        }
        return $menu;
    }
    
    public function custom_user_roles() {
        // $this->add_super_admin();
    
        $this->add_store_admin();
    
        // $this->add_salesman();
    }

    private function add_super_admin() {
        $administrator = get_role('administrator');
        add_role(
            'saas_admin',
            __('Saas Admin'),
            $administrator->capabilities
        );
    }

    private function add_store_admin() {
        $role = get_role('store_admin');
        if( $role ){
            remove_role('store_admin');
        }
        $administrator = get_role('administrator');
        // Add Admin role
        // remove_role('store_admin');
        add_role(
            'store_admin',
            __('Store Admin'),
            // [
            //     'read' => true,
            //     'manage_options' => true
            // ]
            $administrator->capabilities
        );
        
    }

    private function add_salesman() {
        // Add Salesman role
        // remove_role('salesman');
        add_role(
            'salesman',
            __('Salesman'),
            array(
                'read' => true,
                'edit_posts' => false, // No editing own posts
                'delete_posts' => false, // No deleting own posts
                'edit_pages' => false, // No editing pages
                // Define other capabilities relevant to the Salesman role
                // For example: if using WooCommerce, you might want:
                //'manage_products' => true,
            )
        );
    }
}