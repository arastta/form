<?php
/**
 * @package         Arastta Form Component
 * @copyright   Copyright (C) 2015 Arastta Association. All rights reserved. (arastta.org)
 * @copyright   Copyright (C) 2009-2013 Luke Korth
 * @license         GNU General Public License version 3; see LICENSE.txt
 */

namespace Arastta\Component\Form\Element;

class TinyMCE extends Textarea
{
    
    protected $basic;
    protected $jspath;
    protected $function_name;

    public function getInput()
    {
        $html = '';

        $html .= "<textarea" . $this->getAttributes(array("value", "required")) . ">";
        
        if (!empty($this->attributes["value"])) {
            $html .= $this->attributes["value"];
        }
        
        $html .= "</textarea>";

        return $html;
    }

    public function renderJS()
    {
        if (isset($this->function_name)) {
            echo $this->function_name .'(' . $this->attributes["id"] . '); ';
        } else {
            echo 'tinyMCE.init({ mode: "exact", elements: "', $this->attributes["id"], '", width: "100%"';

            if (!empty($this->basic)) {
                echo ', theme: "simple"';
            } else {
                echo ', theme: "advanced", theme_advanced_resizing: true';
            }

            echo '});';

            $ajax = $this->form->getAjax();
            $id = $this->form->getAttribute("id");

            if (!empty($ajax)) {
                echo 'jQuery("#$id").bind("submit", function() { tinyMCE.triggerSave(); });';
            }
        }

    }

    public function getJSFiles()
    {
        return array(
            $this->jspath
        );
    }
}
