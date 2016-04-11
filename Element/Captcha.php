<?php
/**
 * @package         Arastta Form Component
 * @copyright   Copyright (C) 2015 Arastta Association. All rights reserved. (arastta.org)
 * @copyright   Copyright (C) 2009-2013 Luke Korth
 * @license         GNU General Public License version 3; see LICENSE.txt
 */

namespace Arastta\Component\Form\Element;

use Arastta\Component\Form\Element;
use Arastta\Component\Form\Validation\Captcha as ValidationCaptcha;

class Captcha extends Element
{
    
    protected $privateKey = "6LcazwoAAAAAAD-auqUl-4txAK3Ky5jc5N3OXN0_";
    protected $publicKey = "6LcazwoAAAAAADamFkwqj5KN1Gla7l4fpMMbdZfi";

    public function __construct($label = "", array $properties = null)
    {
        parent::__construct($label, "recaptcha_response_field", $properties);
    }

    public function getInput()
    {
        $this->validation[] = new ValidationCaptcha($this->privateKey);

        require_once(__DIR__ . "/../Resources/recaptchalib.php");

        return recaptcha_get_html($this->publicKey);
    }
}
