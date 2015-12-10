<?php
/**
 * @package         Arastta Form Component
 * @copyright   Copyright (C) 2015 Arastta Association. All rights reserved. (arastta.org)
 * @copyright   Copyright (C) 2009-2013 Luke Korth
 * @license         GNU General Public License version 3; see LICENSE.txt
 */

namespace Arastta\Component\Form\Element;

use Arastta\Component\Form\Element;

class Button extends Element
{
    
    protected $attributes = array("type" => "submit", "value" => "Submit");
    protected $icon;

    public function __construct($label = "Submit", $type = "", array $properties = null)
    {
        if (!is_array($properties)) {
            $properties = array();
        }
        
        if (!empty($type)) {
            $properties["type"] = $type;
        }
        
        $class = "btn";
        
        if (empty($type) || $type == "submit") {
            $class .= " btn-primary";
        }
        
        if (!empty($properties["class"])) {
            $properties["class"] .= " " . $class;
        } else {
            $properties["class"] = $class;
        }
        
        if (empty($properties["value"])) {
            $properties["value"] = $label;
        }
        
        parent::__construct("", "", $properties);
    }
}
