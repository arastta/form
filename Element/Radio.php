<?php
/**
 * @package         Arastta Form Component
 * @copyright   Copyright (C) 2015 Arastta Association. All rights reserved. (arastta.org)
 * @copyright   Copyright (C) 2009-2013 Luke Korth
 * @license         GNU General Public License version 3; see LICENSE.txt
 */

namespace Arastta\Component\Form\Element;

use Arastta\Component\Form\OptionElement;

class Radio extends OptionElement
{
    
    protected $attributes = array("type" => "radio", "labelclass" => "");
    protected $inline;

    public function getInput()
    {
        $html = '';

        $labelClass = $this->attributes["type"];
        $labelClass .= " " . $this->attributes["labelclass"];

        if (!empty($this->inline)) {
            $labelClass .= " inline";
        }

        $count = 0;

        foreach ($this->options as $value => $text) {
            $value = $this->getOptionValue($value);

            $html .= '<label class="' . $labelClass . '">
                     <input id="' . $this->attributes["id"] . '-' . $count . '"' .
                       $this->getAttributes(array("id", "value", "checked")) . ' value="' . $this->filter($value) . '"';

            if (isset($this->attributes["value"]) && $this->attributes["value"] == $value) {
                $html .= ' checked="checked"';
            }

            $html .= '/> ' . $text . ' </label> ';

            ++$count;
        }

        return $html;
    }
}
