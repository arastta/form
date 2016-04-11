<?php
/**
 * @package         Arastta Form Component
 * @copyright   Copyright (C) 2015 Arastta Association. All rights reserved. (arastta.org)
 * @copyright   Copyright (C) 2009-2013 Luke Korth
 * @license         GNU General Public License version 3; see LICENSE.txt
 */

namespace Arastta\Component\Form\Element;

use Arastta\Component\Form\Element;

class Textarea extends Element
{
    
    protected $attributes = array("rows" => "5", "class" => "form-control");

    public function getInput()
    {
        $html = '';

        $html .= "<textarea" . $this->getAttributes("value") . ">";
        
        if (!empty($this->attributes["value"])) {
            $html .= $this->filter($this->attributes["value"]);
        }
        
        $html .= "</textarea>";

        return $html;
    }
}
