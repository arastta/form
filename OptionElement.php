<?php
/**
 * @package         Arastta Form Component
 * @copyright   Copyright (C) 2015 Arastta Association. All rights reserved. (arastta.org)
 * @copyright   Copyright (C) 2009-2013 Luke Korth
 * @license         GNU General Public License version 3; see LICENSE.txt
 */

namespace Arastta\Component\Form;

abstract class OptionElement extends Element
{
    
    protected $options;

    public function __construct($label, $name, array $options, array $properties = null)
    {
        $this->options = $options;

        if (!empty($this->options) && array_values($this->options) === $this->options) {
            $this->options = array_combine($this->options, $this->options);
        }

        parent::__construct($label, $name, $properties);
    }

    protected function getOptionValue($value)
    {
        $position = strpos($value, ":form");

        if ($position !== false) {
            if ($position == 0) {
                $value = "";
            } else {
                $value = substr($value, 0, $position);
            }
        }

        return $value;
    }
}
