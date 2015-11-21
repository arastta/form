<?php
/**
 * @package		Arastta Form Component
 * @copyright	Copyright (C) 2015 Arastta Association. All rights reserved. (arastta.org)
 * @copyright	Copyright (C) 2009-2013 Luke Korth
 * @license		GNU General Public License version 3; see LICENSE.txt
 */

namespace Arastta\Component\Form\Element;

class Select extends \Arastta\Component\Form\OptionElement {
	
	protected $_attributes = array();

	public function render() { 
		if (isset($this->_attributes["value"])) {
			if (!is_array($this->_attributes["value"])) {
				$this->_attributes["value"] = array($this->_attributes["value"]);
			}
		}  else {
			$this->_attributes["value"] = array();
		}
		
		if (!empty($this->_attributes["multiple"]) && substr($this->_attributes["name"], -2) != "[]") {
			$this->_attributes["name"] .= "[]";
		}

		echo '<select', $this->getAttributes(array("value", "selected")), '>';
		
		$selected = false;
		
		foreach($this->options as $value => $text) {
			$value = $this->getOptionValue($value);
			
			echo '<option value="', $this->filter($value), '"';
			
			if(!$selected && in_array($value, $this->_attributes["value"])) {
				echo ' selected="selected"';
				$selected = true;
			}	
			
			echo '>', $text, '</option>';
		}	
		
		echo '</select>';
	}
}