<?php
/**
 * @package         Arastta Form Component
 * @copyright   Copyright (C) 2015 Arastta Association. All rights reserved. (arastta.org)
 * @copyright   Copyright (C) 2009-2013 Luke Korth
 * @license         GNU General Public License version 3; see LICENSE.txt
 */

namespace Arastta\Component\Form\Element;

use Arastta\Component\Form\OptionElement;

class Checkbox extends OptionElement
{
    
    protected $attributes = array("type" => "checkbox");
    protected $inline;

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
        
        if (substr($this->attributes["name"], -2) != "[]") {
            $this->attributes["name"] .= "[]";
        }

        $labelClass = $this->attributes["type"];
        
        if (!empty($this->inline)) {
            $labelClass .= " inline";
        }
        
        $count = 0;
        
        foreach ($this->options as $value => $text) {
            $value = $this->getOptionValue($value);

            $html .= '<label class="' . $labelClass . '">
                    <input id="' . $this->attributes["id"] . '-' . $count . '"' .
                        $this->getAttributes(array("id", "value", "checked", "required")) .
                        ' value="' . $this->filter($value) . '"';
            
            if (in_array($value, $this->attributes["value"])) {
                $html .= ' checked="checked"';
            }

            $html .= '/> ' . $text . ' </label> ';
            
            ++$count;
        }

        return $html;
    }
}
