<?php
/**
 * @package		Arastta Form Component
 * @copyright	Copyright (C) 2015 Arastta Association. All rights reserved. (arastta.org)
 * @copyright	Copyright (C) 2009-2013 Luke Korth
 * @license		GNU General Public License version 3; see LICENSE.txt
 */

namespace Arastta\Component\Form\View;

class Vertical extends \Arastta\Component\Form\View {
	
	public function render() {
		echo '<form', $this->_form->getAttributes(), '>';

		$this->_form->getErrorView()->render();

		$elements = $this->_form->getElements();
        $elementSize = sizeof($elements);
        $elementCount = 0;

        for($e = 0; $e < $elementSize; ++$e) {
            $element = $elements[$e];

            if ($element instanceof \Arastta\Component\Form\Element\Button) {
                if ($e == 0 || !$elements[($e - 1)] instanceof \Arastta\Component\Form\Element\Button) {
                    echo '<div class="form-actions">';
                } else {
                    echo ' ';
                }

                $element->render();

                if (($e + 1) == $elementSize || !$elements[($e + 1)] instanceof \Arastta\Component\Form\Element\Button) {
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

	protected function renderLabel(\Arastta\Component\Form\Element $element) {
        $label = $element->getLabel();

		echo '<label for="', $element->getAttribute("id"), '">';

        if(!empty($label)) {
			if($element->isRequired()) {
                echo '<span class="required">* </span>';
            }

			echo $label;
        }

		echo '</label>'; 
    }
}	
