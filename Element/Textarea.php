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

    public function render()
    {
        echo "<textarea", $this->getAttributes("value"), ">";
        
        if (!empty($this->attributes["value"])) {
            echo $this->filter($this->attributes["value"]);
        }
        
        echo "</textarea>";
    }
}
