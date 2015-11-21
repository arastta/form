<?php
/**
 * @package		Arastta Form Component
 * @copyright	Copyright (C) 2015 Arastta Association. All rights reserved. (arastta.org)
 * @copyright	Copyright (C) 2009-2013 Luke Korth
 * @license		GNU General Public License version 3; see LICENSE.txt
 */

namespace Arastta\Component\Form\View;

class Inline extends \Arastta\Component\Form\View {
	
	protected $class = "form-inline";

	public function render() {
		$this->_form->appendAttribute("class", $this->class);

		echo '<form', $this->_form->getAttributes(), '>';

		$this->_form->getErrorView()->render();

		$elements = $this->_form->getElements();
        $elementSize = sizeof($elements);
        $elementCount = 0;

        for ($e = 0; $e < $elementSize; ++$e) {
			if ($e > 0) {
				echo ' ';
			}

            $element = $elements[$e];

			echo $this->renderLabel($element), ' ', $element->render(), $this->renderDescriptions($element);

			++$elementCount;
        }

		echo '</form>';
    }

	protected function renderLabel(\Arastta\Component\Form\Element $element) {
        $label = $element->getLabel();

        if (!empty($label)) {
			echo '<label for="', $element->getAttribute("id"), '">';

			if ($element->isRequired()) {
				echo '<span class="required">* </span>';
			}

			echo $label;
			echo '</label>'; 
        }
    }
}