<?php
/**
 * @package         Arastta Form Component
 * @copyright   Copyright (C) 2015 Arastta Association. All rights reserved. (arastta.org)
 * @copyright   Copyright (C) 2009-2013 Luke Korth
 * @license         GNU General Public License version 3; see LICENSE.txt
 */

namespace Arastta\Component\Form\Validation;

class Alphanumeric extends RegExp
{
    
    protected $message = "Error: %element% must be alphanumeric
                            (contain only numbers, letters, underscores, and/or hyphens).";

    public function __construct($message = "")
    {
        parent::__construct("/^[a-zA-Z0-9_-]+$/", $message);
    }
}
