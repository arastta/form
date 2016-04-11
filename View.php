<?php
/**
 * @package         Arastta Form Component
 * @copyright   Copyright (C) 2015 Arastta Association. All rights reserved. (arastta.org)
 * @copyright   Copyright (C) 2009-2013 Luke Korth
 * @license         GNU General Public License version 3; see LICENSE.txt
 */

namespace Arastta\Component\Form;

abstract class View extends Base
{
    
    protected $form;

    public function __construct(array $properties = null)
    {
        $this->configure($properties);
    }

    public function setForm(Form $form)
    {
        $this->form = $form;
    }

    public function jQueryDocumentReady()
    {
    }

    public function render()
    {
    }

    public function renderCSS()
    {
        echo 'span.help-inline, span.help-block { color: #888; font-size: .9em; font-style: italic; }';
    }

    protected function getDescriptions($element)
    {
        $html = '';

        $shortDesc = $element->getShortDesc();

        if (!empty($shortDesc)) {
            $html .= '<span class="help-inline">' . $shortDesc . '</span>';
        }

        $longDesc = $element->getLongDesc();

        if (!empty($longDesc)) {
            $html .= '<span class="help-block">' . $longDesc . '</span>';
        }

        return $html;
    }

    public function renderJS()
    {
    }

    protected function renderLabel(Element $element)
    {
    }
}
