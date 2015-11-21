<?php
/**
 * @package		Arastta Form Component
 * @copyright	Copyright (C) 2015 Arastta Association. All rights reserved. (arastta.org)
 * @copyright	Copyright (C) 2009-2013 Luke Korth
 * @license		GNU General Public License version 3; see LICENSE.txt
 */

namespace Arastta\Component\Form\Element;

class Number extends Textbox {
	
	protected $_attributes = array("type" => "number", "class" => "form-control");

	public function render() {
		$this->validation[] = new \Arastta\Component\Form\Validation\Numeric;

		parent::render();
	}
}