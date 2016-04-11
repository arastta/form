<?php
/**
 * @package         Arastta Form Component
 * @copyright   Copyright (C) 2015 Arastta Association. All rights reserved. (arastta.org)
 * @copyright   Copyright (C) 2009-2013 Luke Korth
 * @license         GNU General Public License version 3; see LICENSE.txt
 */

namespace Arastta\Component\Form\Element;

use Arastta\Component\Form\Validation\Url as ValidationUrl;

class Url extends Textbox
{
    
    protected $attributes = array("type" => "url", "class" => "form-control");

    public function render()
    {
        $html = '';

        $this->validation[] = new ValidationUrl;

        $html .= parent::getInput();

        return $html;
    }
}
