<?php
/**
 * @package         Arastta Form Component
 * @copyright   Copyright (C) 2015 Arastta Association. All rights reserved. (arastta.org)
 * @copyright   Copyright (C) 2009-2013 Luke Korth
 * @license         GNU General Public License version 3; see LICENSE.txt
 */

namespace Arastta\Component\Form\Element;

use Arastta\Component\Form\Validation\Email as ValidationEmail;

class Email extends Textbox
{
    
    protected $attributes = array("type" => "email", "class" => "form-control");

    public function render()
    {
        $html = '';

        $this->validation[] = new ValidationEmail();

        $html .= parent::getInput();

        return $html;
    }
}
