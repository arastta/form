<?php
/**
 * @package         Arastta Form Component
 * @copyright   Copyright (C) 2015 Arastta Association. All rights reserved. (arastta.org)
 * @copyright   Copyright (C) 2009-2013 Luke Korth
 * @license         GNU General Public License version 3; see LICENSE.txt
 */

namespace Arastta\Component\Form\View;

use Arastta\Component\Form\View;
use Arastta\Component\Form\Element;

class Inline extends View
{
    
    protected $class = "form-inline";

    public function render()
    {
        $this->form->appendAttribute("class", $this->class);

        echo '<form', $this->form->getAttributes(), '>';

        $this->form->getErrorView()->render();

        $elements = $this->form->getElements();
        $elementSize = sizeof($elements);
        $elementCount = 0;

        for ($e = 0; $e < $elementSize; ++$e) {
            if ($e > 0) {
                echo ' ';
            }

            $element = $elements[$e];

            echo $this->getLabel($element) . ' ' . $element->getInput() . $this->getDescriptions($element);

            ++$elementCount;
        }

        echo '</form>';
    }

    protected function getLabel(Element $element)
    {
        $html = '';

        $label = $element->getLabel();

        if (!empty($label)) {
            $html .= '<label for="' . $element->getAttribute("id") . '">';

            if ($element->isRequired()) {
                $html .= '<span class="required">* </span>';
            }

            $html .= $label;
            $html .= '</label>';
        }

        return $html;
    }
}
