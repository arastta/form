<?php
/**
 * @package         Arastta Form Component
 * @copyright   Copyright (C) 2015 Arastta Association. All rights reserved. (arastta.org)
 * @copyright   Copyright (C) 2009-2013 Luke Korth
 * @license         GNU General Public License version 3; see LICENSE.txt
 */

namespace Arastta\Component\Form\Element;

use Arastta\Component\Form\OptionElement;

class Select extends OptionElement
{
    
    protected $attributes = array();

    public function getInput()
    {
        $html = '';

        if (isset($this->attributes["value"])) {
            if (!is_array($this->attributes["value"])) {
                $this->attributes["value"] = array($this->attributes["value"]);
            }
        } else {
            $this->attributes["value"] = array();
        }
        
        if (!empty($this->attributes["multiple"]) && substr($this->attributes["name"], -2) != "[]") {
            $this->attributes["name"] .= "[]";
        }

        $html .= '<select' . $this->getAttributes(array("value", "selected")) . '>';
        
        $selected = false;
        
        foreach ($this->options as $value => $text) {
            $value = $this->getOptionValue($value);

            $html .= '<option value="' . $this->filter($value) . '"';
            
            if (!$selected && in_array($value, $this->attributes["value"])) {
                $html .= ' selected="selected"';
                $selected = true;
            }
            
            $html .= '>' . $text . '</option>';
        }
        
        $html .= '</select>';

        return $html;
    }
}
