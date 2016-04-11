<?php
/**
 * @package         Arastta Form Component
 * @copyright   Copyright (C) 2015 Arastta Association. All rights reserved. (arastta.org)
 * @copyright   Copyright (C) 2009-2013 Luke Korth
 * @license         GNU General Public License version 3; see LICENSE.txt
 */

namespace Arastta\Component\Form\View;

use Arastta\Component\Form\View as View;
use Arastta\Component\Form\Element as Element;
use Arastta\Component\Form\Element\Button as Button;

class Vertical extends View
{
    
    public function render()
    {
        echo '<form', $this->form->getAttributes(), '>';

        $this->form->getErrorView()->render();

        $elements = $this->form->getElements();
        $elementSize = sizeof($elements);
        $elementCount = 0;

        for ($e = 0; $e < $elementSize; ++$e) {
            $element = $elements[$e];

            if ($element instanceof Button) {
                if ($e == 0 || !$elements[($e - 1)] instanceof Button) {
                    echo '<div class="form-actions">';
                } else {
                    echo ' ';
                }

                echo $element->getInput();

                if (($e + 1) == $elementSize || !$elements[($e + 1)] instanceof Button) {
                    echo '</div>';
                }
            } else {
                echo $this->getLabel($element);

                echo $element->getInput();

                echo $this->getDescriptions($element);

                ++$elementCount;
            }
        }

        echo '</form>';
    }

    protected function getLabel(Element $element)
    {
        $html = '';

        $label = $element->getLabel();

        $html .= '<label for="' . $element->getAttribute("id") . '">';

        if (!empty($label)) {
            if ($element->isRequired()) {
                $html .= '<span class="required">* </span>';
            }

            $html .= $label;
        }

        $html .= '</label>';

        return $html;
    }
}
