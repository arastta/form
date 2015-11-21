<?php
/**
 * @package		Arastta Form Component
 * @copyright	Copyright (C) 2015 Arastta Association. All rights reserved. (arastta.org)
 * @copyright	Copyright (C) 2009-2013 Luke Korth
 * @license		GNU General Public License version 3; see LICENSE.txt
 */

namespace Arastta\Component\Form\Element;

class Date extends Textbox {
	
	protected $_attributes = array(
		"type" => "date",
		"pattern" => "\d{4}-\d{2}-\d{2}",
		"class" => "form-control"
	);

	public function __construct($label, $name, array $properties = null) {
		$this->_attributes["placeholder"] = "YYYY-MM-DD (e.g. " . date("Y-m-d") . ")";
		$this->_attributes["title"] = $this->_attributes["placeholder"];

		parent::__construct($label, $name, $properties);
    }

	public function render() {
		$this->validation[] = new \Arastta\Component\Form\Validation\RegExp("/" . $this->_attributes["pattern"] . "/", "Error: The %element% field must match the following date format: " . $this->_attributes["title"]);

		parent::render();
	}
}