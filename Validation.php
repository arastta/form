<?php
/**
 * @package         Arastta Form Component
 * @copyright   Copyright (C) 2015 Arastta Association. All rights reserved. (arastta.org)
 * @copyright   Copyright (C) 2009-2013 Luke Korth
 * @license         GNU General Public License version 3; see LICENSE.txt
 */

namespace Arastta\Component\Form;

abstract class Validation extends Base
{
    
    protected $message = "%element% is invalid.";

    public function __construct($message = "")
    {
        if (!empty($message)) {
            $this->message = $message;
        }
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function isNotApplicable($value)
    {
        if (is_null($value) || is_array($value) || $value === "") {
            return true;
        }

        return false;
    }

    abstract public function isValid($value);
}
