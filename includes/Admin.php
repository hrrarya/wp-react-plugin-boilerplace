<?php

namespace MainPlugin;

class Admin {
    public function __construct() {
        $this->add_menu();
        $this->add_assets();
    }

    private function add_menu(){
        new Admin\Menu;
    }

    private function add_assets(){
        new Admin\Assets;
    }
}