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
use Arastta\Component\Form\Element\HTML as HTML;
use Arastta\Component\Form\Element\Button as Button;
use Arastta\Component\Form\Element\Hidden as Hidden;

class SideBySide extends View
{
    protected $class = "form-horizontal";

    public function render()
    {
        $this->form->appendAttribute("class", $this->class);

        echo '<form', $this->form->getAttributes(), '><fieldset>';

        $this->form->getErrorView()->render();

        $elements = $this->form->getElements();
        $elementSize = sizeof($elements);
        $elementCount = 0;

        for ($e = 0; $e < $elementSize; ++$e) {
            $element = $elements[$e];

            if ($element instanceof Hidden || $element instanceof HTML
            ) {
                echo $element->getInput();
            } elseif ($element instanceof Button) {
                if ($e == 0 || !$elements[($e - 1)] instanceof Button) {
                    echo '<div class="form-actions">';
                } else {
                    echo ' ';
                }

                echo $element->getInput();

                if (($e + 1) == $elementSize ||
                    !$elements[($e + 1)] instanceof Button
                ) {
                    echo '</div>';
                }
            } else {
                $required = null;

                if ($element->isRequired()) {
                    $required = 'required';
                }

                echo '<div class="form-group ' . $required . '">' .
                        $this->getLabel($element) .
                        '<div class="col-sm-10">' .
                            $element->getInput() . $this->getDescriptions($element) .
                        '</div>
                      </div>';

                ++$elementCount;
            }
        }

        echo '</fieldset></form>';
    }

    protected function getLabel(Element $element)
    {
        $html = '';

        $label = $element->getLabel();

        if (!empty($label)) {
            $html .= '<label class="col-sm-2 control-label" for="' . $element->getAttribute("id") . '">';
            $html .= $label . '</label>';
        }

        return $html;
    }
}
