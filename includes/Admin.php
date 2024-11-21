<?php

namespace InventoryPos;

class Admin {
    public function __construct() {
        $this->add_roles();
        $this->add_menu();
        $this->add_scripts();
    }

    public function add_menu() {
        new Admin\Menu;
    }
    public function add_scripts() {
        new Admin\Assets;
    }
    public function add_roles() {
        new Admin\Role;
    }
}