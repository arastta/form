<?php
/**
 * @package         Arastta Form Component
 * @copyright   Copyright (C) 2015 Arastta Association. All rights reserved. (arastta.org)
 * @copyright   Copyright (C) 2009-2013 Luke Korth
 * @license         GNU General Public License version 3; see LICENSE.txt
 */

namespace Arastta\Component\Form\Element;

class Checksort extends Sort
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
        $existing = "";

        foreach ($this->options as $value => $text) {
            $value = $this->getOptionValue($value);
            
            if (!empty($this->inline) && $count > 0) {
                $html .= ' ';
            }

            $html .= '<label class="' . $labelClass . '">
                    <input id="' . $this->attributes["id"] . '-' . $count . '"' .
                        $this->getAttributes(array("id", "value", "checked", "name", "onclick", "required")) .
                        ' value="' . $this->filter($value) . '"';
            
            if (in_array($value, $this->attributes["value"])) {
                $html .= ' checked="checked"';
            }

            $html .= ' onclick="updateChecksort(this, \'' .
                    str_replace(array('"', "'"), array('&quot;', "\'"), $text) . '\');"/>' . $text . '</label>';

            if (in_array($value, $this->attributes["value"])) {
                $existing .= '<li id="' . $this->attributes["id"] . "-sort-" . $count . '" class="ui-state-default">
                    <input type="hidden" name="' . $this->attributes["name"] . '" value="' . $value . '"/>' .
                    $text . '</li>';
            }

            ++$count;
        }

        $html .= '<ul id="' . $this->attributes["id"] . '">' . $existing . '</ul>';

        return $html;
    }

    public function renderJS()
    {
        echo <<<JS
if(typeof updateChecksort != "function") {      
    function updateChecksort(element, text) {
        var position = element.id.lastIndexOf("-");
        var id = element.id.substr(0, position);
        var index = element.id.substr(position + 1);
        if(element.checked) {
            jQuery("#" + id).append('<li id="' + id + '-sort-' + index + '" class="ui-state-default">' +
            '<input type="hidden" name="{$this->attributes["name"]}" value="' + element.value + '"/>' + text + '</li>');
        }   
        else
            jQuery("#" + id + "-sort-" + index).remove();
    }
}
JS;
    }
}
