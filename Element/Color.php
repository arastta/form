<?php
/**
 * @package         Arastta Form Component
 * @copyright   Copyright (C) 2015 Arastta Association. All rights reserved. (arastta.org)
 * @copyright   Copyright (C) 2009-2013 Luke Korth
 * @license         GNU General Public License version 3; see LICENSE.txt
 */

namespace Arastta\Component\Form\Element;

use Arastta\Component\Form\Validation\RegExp as RegExp;

class Color extends Textbox
{
    protected $attributes = array("type" => "color", "class" => "form-control");

    public function render()
    {
        $html = '';

        $this->attributes["pattern"] = "#[a-g0-9]{6}";
        $this->attributes["title"]   = "6-digit hexidecimal color (e.g. #000000)";

        $msg =  "Error: The %element% field must contain a " . $this->attributes["title"];

        $this->validation[] = new RegExp("/" . $this->attributes["pattern"] . "/", $msg);

        $html .= parent::getInput();

        return $html;
    }
}
