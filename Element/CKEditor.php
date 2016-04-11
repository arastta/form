<?php
/**
 * @package         Arastta Form Component
 * @copyright   Copyright (C) 2015 Arastta Association. All rights reserved. (arastta.org)
 * @copyright   Copyright (C) 2009-2013 Luke Korth
 * @license         GNU General Public License version 3; see LICENSE.txt
 */

namespace Arastta\Component\Form\Element;

class CKEditor extends Textarea
{
    
    protected $basic;
    protected $jspath;
    protected $function_name;

    public function render()
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
            if (!empty($this->basic)) {
                echo <<<JS
var basicConfig = {
    height: 100,
    plugins: 'about,basicstyles,clipboard,list,indent,enterkey,entities,link,pastetext,toolbar,undo,wysiwygarea',
    forcePasteAsPlainText : true,
    removeButtons: 'Anchor,Underline,Strike,Subscript,Superscript',
    toolbarGroups: [
        { name: 'document',    groups: [ 'mode', 'document', 'doctools' ] },
        { name: 'editing',     groups: [ 'find', 'selection', 'spellchecker' ] },
        { name: 'forms' },
        { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
        { name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align' ] },
        { name: 'links' },
        { name: 'insert' },
        { name: 'styles' },
        { name: 'colors' },
        { name: 'tools' },
        { name: 'others' },
        { name: 'about' }
    ]
};
JS;
            }

            echo 'CKEDITOR.replace("', $this->attributes["id"], '"';

            if (!empty($this->basic)) {
                echo ', basicConfig';
            }

            echo ');';

            $ajax = $this->form->getAjax();
            $id = $this->form->getAttribute("id");

            if (!empty($ajax)) {
                echo 'jQuery("#' . $id . '").bind("submit", function() {
                            CKEDITOR.instances["' . $this->attributes["id"] . '"].updateElement();
                      });';
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
