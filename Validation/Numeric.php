<?php
/**
 * @package         Arastta Form Component
 * @copyright   Copyright (C) 2015 Arastta Association. All rights reserved. (arastta.org)
 * @copyright   Copyright (C) 2009-2013 Luke Korth
 * @license         GNU General Public License version 3; see LICENSE.txt
 */

namespace Arastta\Component\Form\Validation;

use Arastta\Component\Form\Validation;

class Numeric extends Validation
{
    
    protected $message = "Error: %element% must be numeric.";

    public function isValid($value)
    {
        if ($this->isNotApplicable($value) || is_numeric($value)) {
            return true;
        }
        
        return false;
    }
}
