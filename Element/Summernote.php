<?php
/**
 * @package		Arastta Form Component
 * @copyright	Copyright (C) 2015 Arastta Association. All rights reserved. (arastta.org)
 * @copyright	Copyright (C) 2009-2013 Luke Korth
 * @license		GNU General Public License version 3; see LICENSE.txt
 */

namespace Arastta\Component\Form\Element;

class SummerNote extends Textarea {
	
	protected $basic;
	protected $csspath;
	protected $jspath;
	protected $function_name;

	public function render() {
        echo "<textarea", $this->getAttributes(array("value", "required")), ">";
        
		if (!empty($this->_attributes["value"])) {
            echo $this->_attributes["value"];
		}
		
        echo "</textarea>";
    }

	public function renderJS() {
		if (isset($this->function_name)) {
			echo $this->function_name .'(' . $this->_attributes["id"] . '); ';
		} else {
			echo 'tinyMCE.init({ mode: "exact", elements: "', $this->_attributes["id"], '", width: "100%"';

			if (!empty($this->basic)) {
				echo ', theme: "simple"';
			} else {
				echo ', theme: "advanced", theme_advanced_resizing: true';
			}

			echo '});';

			$ajax = $this->_form->getAjax();
			$id = $this->_form->getAttribute("id");

			if (!empty($ajax)) {
				echo 'jQuery("#$id").bind("submit", function() { tinyMCE.triggerSave(); });';
			}
		}
	}

	public function renderCSSFiles() {
		return array(
			$this->csspath
		);
	}

	public function getJSFiles() {
		return array(
			$this->jspath
		);
	}
}