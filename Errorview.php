<?php
/**
 * @package         Arastta Form Component
 * @copyright   Copyright (C) 2015 Arastta Association. All rights reserved. (arastta.org)
 * @copyright   Copyright (C) 2009-2013 Luke Korth
 * @license         GNU General Public License version 3; see LICENSE.txt
 */

namespace Arastta\Component\Form;

abstract class ErrorView extends Base
{
    
    protected $form;

    public function __construct(array $properties = null)
    {
        $this->configure($properties);
    }

    abstract public function applyAjaxErrorResponse();

    public function clear()
    {
        echo 'jQuery("#', $this->form->getAttribute("id"), ' .alert-error").remove();';
    }

    abstract public function render();
    abstract public function renderAjaxErrorResponse();

    public function renderCSS()
    {
    }

    public function setForm(Form $form)
    {
        $this->form = $form;
    }
}
