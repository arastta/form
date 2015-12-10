<?php
/**
 * @package         Arastta Form Component
 * @copyright   Copyright (C) 2015 Arastta Association. All rights reserved. (arastta.org)
 * @copyright   Copyright (C) 2009-2013 Luke Korth
 * @license         GNU General Public License version 3; see LICENSE.txt
 */

namespace Arastta\Component\Form\Validation;

use Arastta\Component\Form\Validation;

class RegExp extends Validation
{
    
    protected $message = "Error: %element% contains invalid characters.";
    protected $pattern;

    public function __construct($pattern, $message = "")
    {
        $this->pattern = $pattern;
        parent::__construct($message);
    }

    public function isValid($value)
    {
        if ($this->isNotApplicable($value) || preg_match($this->pattern, $value)) {
            if ($this->isNotApplicable($value) || preg_match($this->pattern, $value)) {
                return true;
            }

            return false;
        }
    }
}
