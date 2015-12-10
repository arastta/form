<?php
/**
 * @package         Arastta Form Component
 * @copyright   Copyright (C) 2015 Arastta Association. All rights reserved. (arastta.org)
 * @copyright   Copyright (C) 2009-2013 Luke Korth
 * @license         GNU General Public License version 3; see LICENSE.txt
 */

namespace Arastta\Component\Form\Validation;

use Arastta\Component\Form\Validation;

class Captcha extends Validation
{
    
    protected $message = "Error: The reCATPCHA response provided was incorrect.  Please re-try.";
    protected $privateKey;

    public function __construct($privateKey, $message = "")
    {
        $this->privateKey = $privateKey;

        if (!empty($message)) {
            $this->message = $message;
        }
    }

    public function isValid($value)
    {
        require_once(__DIR__ . "/../Resources/recaptchalib.php");

        $resp = recaptcha_check_answer(
            $this->privateKey,
            $_SERVER["REMOTE_ADDR"],
            $_POST["recaptcha_challenge_field"],
            $_POST["recaptcha_response_field"]
        );
        
        if ($resp->is_valid) {
            return true;
        } else {
            return false;
        }
    }
}
