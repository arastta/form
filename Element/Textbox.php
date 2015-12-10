<?php
/**
 * @package         Arastta Form Component
 * @copyright   Copyright (C) 2015 Arastta Association. All rights reserved. (arastta.org)
 * @copyright   Copyright (C) 2009-2013 Luke Korth
 * @license         GNU General Public License version 3; see LICENSE.txt
 */

namespace Arastta\Component\Form\Element;

use Arastta\Component\Form\Element;

class Textbox extends Element
{
    
    protected $attributes = array("type" => "text", "class" => "form-control");
    protected $prepend;
    protected $append;

    public function render()
    {
        $addons = array();

        if (!empty($this->prepend)) {
            $addons[] = "input-prepend";
        }
        
        if (!empty($this->append)) {
            $addons[] = "input-append";
        }
        
        if (!empty($addons)) {
            echo '<div class="', implode(" ", $addons), '">';
        }
        
        $this->renderAddOn("prepend");
        
        parent::render();
        
        $this->renderAddOn("append");

        if (!empty($addons)) {
            echo '</div>';
        }
    }

    protected function renderAddOn($type = "prepend")
    {
        if (!empty($this->$type)) {
            $span = true;
            
            if (strpos($this->$type, "<button") !== false) {
                $span = false;
            }
            
            if ($span) {
                echo '<span class="add-on">';
            }
                
            echo $this->$type;

            if ($span) {
                echo '</span>';
            }
        }
    }
}
