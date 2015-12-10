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

                $element->render();

                if (($e + 1) == $elementSize || !$elements[($e + 1)] instanceof Button) {
                    echo '</div>';
                }
            } else {
                $this->renderLabel($element);

                $element->render();

                $this->renderDescriptions($element);

                ++$elementCount;
            }
        }

        echo '</form>';
    }

    protected function renderLabel(Element $element)
    {
        $label = $element->getLabel();

        echo '<label for="', $element->getAttribute("id"), '">';

        if (!empty($label)) {
            if ($element->isRequired()) {
                echo '<span class="required">* </span>';
            }

            echo $label;
        }

        echo '</label>';
    }
}
