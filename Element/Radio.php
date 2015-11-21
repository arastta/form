<?php
/**
 * @package		Arastta Form Component
 * @copyright	Copyright (C) 2015 Arastta Association. All rights reserved. (arastta.org)
 * @copyright	Copyright (C) 2009-2013 Luke Korth
 * @license		GNU General Public License version 3; see LICENSE.txt
 */

namespace Arastta\Component\Form\Element;

class Radio extends \Arastta\Component\Form\OptionElement {
	
	protected $_attributes = array("type" => "radio");
	protected $inline;

	public function render() { 
		$labelClass = $this->_attributes["type"];

		if (!empty($this->inline)) {
			$labelClass .= " inline";
		}

		$count = 0;

		foreach ($this->options as $value => $text) {
			$value = $this->getOptionValue($value);

			echo '<label class="', $labelClass . '"> <input id="', $this->_attributes["id"], '-', $count, '"', $this->getAttributes(array("id", "value", "checked")), ' value="', $this->filter($value), '"';

			if (isset($this->_attributes["value"]) && $this->_attributes["value"] == $value) {
				echo ' checked="checked"';
			}

			echo '/> ', $text, ' </label> ';

			++$count;
		}	
	}
}