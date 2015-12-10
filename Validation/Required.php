<?php
/**
 * @package         Arastta Form Component
 * @copyright   Copyright (C) 2015 Arastta Association. All rights reserved. (arastta.org)
 * @copyright   Copyright (C) 2009-2013 Luke Korth
 * @license         GNU General Public License version 3; see LICENSE.txt
 */

namespace Arastta\Component\Form\Validation;

use Arastta\Component\Form\Validation;

class Required extends Validation
{
    
    protected $message = "Error: %element% is a required field.";

    public function isValid($value)
    {
        $valid = false;
        
        if (!is_null($value) && ((!is_array($value) && $value !== "") || (is_array($value) && !empty($value)))) {
            $valid = true;
        }
        
        return $valid;
    }
}
