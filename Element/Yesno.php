<?php
/**
 * @package         Arastta Form Component
 * @copyright   Copyright (C) 2015 Arastta Association. All rights reserved. (arastta.org)
 * @copyright   Copyright (C) 2009-2013 Luke Korth
 * @license         GNU General Public License version 3; see LICENSE.txt
 */

namespace Arastta\Component\Form\Element;

class YesNo extends Radio
{
    
    public function __construct($label, $name, array $properties = null, array $options_text = null)
    {
        $options = array(
            "1" => isset($options_text['yes']) ? $options_text['yes'] : "Yes",
            "0" => isset($options_text['no'])  ? $options_text['no']  : "No"
        );

        if (!is_array($properties)) {
            $properties = array("inline" => 1);
        } elseif (!array_key_exists("inline", $properties)) {
            $properties["inline"] = 1;
        }
        
        parent::__construct($label, $name, $options, $properties);
    }
}
