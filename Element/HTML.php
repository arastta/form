<?php
/**
 * @package         Arastta Form Component
 * @copyright   Copyright (C) 2015 Arastta Association. All rights reserved. (arastta.org)
 * @copyright   Copyright (C) 2009-2013 Luke Korth
 * @license         GNU General Public License version 3; see LICENSE.txt
 */

namespace Arastta\Component\Form\Element;

use Arastta\Component\Form\Element;

class HTML extends Element
{
    
    public function __construct($value)
    {
        $properties = array("value" => $value);

        parent::__construct("", "", $properties);
    }

    public function getInput()
    {
        return $this->attributes["value"];
    }
}
