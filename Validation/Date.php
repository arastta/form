<?php
/**
 * @package         Arastta Form Component
 * @copyright   Copyright (C) 2015 Arastta Association. All rights reserved. (arastta.org)
 * @copyright   Copyright (C) 2009-2013 Luke Korth
 * @license         GNU General Public License version 3; see LICENSE.txt
 */

namespace Arastta\Component\Form\Validation;

use Arastta\Component\Form\Validation;

class Date extends Validation
{
    
    protected $message = "Error: %element% must contain a valid date.";

    public function isValid($value)
    {
        try {
            $date = new \DateTime($value);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}
