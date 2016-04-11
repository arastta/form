<?php
/**
 * @package         Arastta Form Component
 * @copyright   Copyright (C) 2015 Arastta Association. All rights reserved. (arastta.org)
 * @copyright   Copyright (C) 2009-2013 Luke Korth
 * @license         GNU General Public License version 3; see LICENSE.txt
 */

namespace Arastta\Component\Form\Element;

use Arastta\Component\Form\Validation\Date;

class JQueryUIDate extends Textbox
{
    
    protected $attributes = array(
        "type" => "text",
        "autocomplete" => "off",
        "class" => "form-control"
    );
    protected $jQueryOptions;

    public function getCSSFiles()
    {
        return array(
            //$this->form->getPrefix() . "://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/smoothness/jquery-ui.css"
        );
    }

    public function getJSFiles()
    {
        return array(
            //$this->form->getPrefix() . "://ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js"
        );
    }

    public function jQueryDocumentReady()
    {
        parent::jQueryDocumentReady();

        echo 'jQuery("#', $this->attributes["id"], '").datepicker(', $this->jQueryOptions(), ');';
    }

    public function getInput()
    {
        $html = '';

        $this->validation[] = new Date;

        $html .= parent::getInput();

        return $html;
    }
}
