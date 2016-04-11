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

    public function getInput()
    {
        $html = '';

        $addons = array();

        if (!empty($this->prepend)) {
            $addons[] = "input-prepend";
        }
        
        if (!empty($this->append)) {
            $addons[] = "input-append";
        }
        
        if (!empty($addons)) {
            $html .= '<div class="' . implode(" ", $addons) . '">';
        }

        $html .= $this->getAddOn("prepend");

        $html .= parent::getInput();

        $html .= $this->getAddOn("append");

        if (!empty($addons)) {
            $html .= '</div>';
        }

        return $html;
    }

    protected function getAddOn($type = "prepend")
    {
        $html = '';

        if (!empty($this->$type)) {
            $span = true;
            
            if (strpos($this->$type, "<button") !== false) {
                $span = false;
            }
            
            if ($span) {
                $html .= '<span class="add-on">';
            }

            $html .= $this->$type;

            if ($span) {
                $html .= '</span>';
            }
        }

        return $html;
    }
}
