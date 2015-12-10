<?php
/**
 * @package         Arastta Form Component
 * @copyright   Copyright (C) 2015 Arastta Association. All rights reserved. (arastta.org)
 * @copyright   Copyright (C) 2009-2013 Luke Korth
 * @license         GNU General Public License version 3; see LICENSE.txt
 */

namespace Arastta\Component\Form\Element;

use Arastta\Component\Form\Element;

class Hidden extends Element
{
    
    protected $attributes = array("type" => "hidden");

    public function __construct($name, $value = "", array $properties = null)
    {
        if (!is_array($properties)) {
            $properties = array();
        }

        if (!empty($value)) {
            $properties["value"] = $value;
        }

        parent::__construct("", $name, $properties);
    }
}
