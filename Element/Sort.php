<?php
/**
 * @package         Arastta Form Component
 * @copyright   Copyright (C) 2015 Arastta Association. All rights reserved. (arastta.org)
 * @copyright   Copyright (C) 2009-2013 Luke Korth
 * @license         GNU General Public License version 3; see LICENSE.txt
 */

namespace Arastta\Component\Form\Element;

use Arastta\Component\Form\OptionElement;

class Sort extends OptionElement
{
    
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
        echo 'jQuery("#' . $this->attributes["id"] . '").sortable(' . $this->jQueryOptions() . ');';
        echo 'jQuery("#' . $this->attributes["id"] . '").disableSelection();';
    }

    public function getInput()
    {
        $html = '';

        if (substr($this->attributes["name"], -2) != "[]") {
            $this->attributes["name"] .= "[]";
        }

        $html .= '<ul id="' . $this->attributes["id"] . '">';

        foreach ($this->options as $value => $text) {
            $value = $this->getOptionValue($value);

            $html .= '<li class="ui-state-default">
                    <input type="hidden" name="' . $this->attributes["name"] . '" value="' . $value . '"/>' . $text .
                 '</li>';
        }

        $html .= "</ul>";

        return $html;
    }

    public function renderCSS()
    {
        echo '#' . $this->attributes["id"] .
            ' { list-style-type: none; margin: 0; padding: 0; cursor: pointer; max-width: 400px; }';
        echo '#' . $this->attributes["id"] . ' li { margin: 0.25em 0; padding: 0.5em; font-size: 1em; }';
    }
}
