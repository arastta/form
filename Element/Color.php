<?php
/**
 * @package		Arastta Form Component
 * @copyright	Copyright (C) 2015 Arastta Association. All rights reserved. (arastta.org)
 * @copyright	Copyright (C) 2009-2013 Luke Korth
 * @license		GNU General Public License version 3; see LICENSE.txt
 */

namespace Arastta\Component\Form\Element;

class Color extends Textbox {
	
	protected $_attributes = array("type" => "color", "class" => "form-control");

	public function render() {
		$this->_attributes["pattern"] = "#[a-g0-9]{6}";
		$this->_attributes["title"] = "6-digit hexidecimal color (e.g. #000000)";

		$this->validation[] = new \Arastta\Component\Form\Validation\RegExp("/" . $this->_attributes["pattern"] . "/", "Error: The %element% field must contain a " . $this->_attributes["title"]);

		parent::render();
	}
}