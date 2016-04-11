<?php
/**
 * @package         Arastta Form Component
 * @copyright   Copyright (C) 2015 Arastta Association. All rights reserved. (arastta.org)
 * @copyright   Copyright (C) 2009-2013 Luke Korth
 * @license         GNU General Public License version 3; see LICENSE.txt
 */

namespace Arastta\Component\Form\Element;

use Arastta\Component\Form\Validation\RegExp as RegExp;

class Week extends Textbox
{
    
    protected $attributes = array(
        "type" => "week",
        "pattern" => "\d{4}-W\d{2}",
        "class" => "form-control"
    );

    public function __construct($label, $name, array $properties = null)
    {
        $this->attributes["placeholder"] = "YYYY-Www (e.g. " . date("Y-\WW") . ")";
        $this->attributes["title"]       = $this->attributes["placeholder"];

        parent::__construct($label, $name, $properties);
    }

    public function render()
    {
        $html = '';

        $msg =  "Error: The %element% field must match the following date format: " . $this->attributes["title"];

        $this->validation[] = new RegExp("/" . $this->attributes["pattern"] . "/", $msg);

        $html .= parent::getInput();

        return $html;
    }
}
