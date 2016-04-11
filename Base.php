<?php
/**
 * @package         Arastta Form Component
 * @copyright   Copyright (C) 2015 Arastta Association. All rights reserved. (arastta.org)
 * @copyright   Copyright (C) 2009-2013 Luke Korth
 * @license         GNU General Public License version 3; see LICENSE.txt
 */

namespace Arastta\Component\Form;

abstract class Base
{
    
    public function configure(array $properties = null)
    {
        if (!empty($properties)) {
            $class = get_class($this);

            /*The property_reference lookup array is created so that properties can be set
                        case-insensitively.*/
            $available = array_keys(get_class_vars($class));

            $property_reference = array();

            foreach ($available as $property) {
                $property_reference[strtolower($property)] = $property;
            }

            /*The method reference lookup array is created so that "set" methods can be called
                        case-insensitively.*/
            $available = get_class_methods($class);

            $method_reference = array();

            foreach ($available as $method) {
                $method_reference[strtolower($method)] = $method;
            }

            foreach ($properties as $property => $value) {
                $property = strtolower($property);
                /*Properties beginning with "_" cannot be set directly.*/

                if ($property[0] != "_") {
                    /*If the appropriate class has a "set" method for the property provided, then
                                        it is called instead or setting the property directly.*/
                    if (isset($method_reference["set" . $property])) {
                        $func = $method_reference["set" . $property];

                        $this->$func($value);
                    } elseif (isset($property_reference[$property])) {
                        $prop = $property_reference[$property];

                        $this->$prop = $value;
                    } else {
                        /*Entries that don't match an available class property are stored in the attributes
                       property if applicable.  Typically, these entries will be element attributes such as
                       class, value, onkeyup, etc.*/

                        $this->setAttribute($property, $value);
                    }
                }
            }
        }

        return $this;
    }

    /*This method can be used to view a class' state.*/
    public function debug()
    {
        echo "<pre>", print_r($this, true), "</pre>";
    }

    /*This method prevents double/single quotes in html attributes from breaking the markup.*/
    protected function filter($str)
    {
        return htmlspecialchars($str);
    }

    public function getAttribute($attribute)
    {
        $value = "";

        if (isset($this->attributes[$attribute])) {
            $value =  $this->attributes[$attribute];
        }

        return $value;
    }

    /*This method is used by the Form class and all Element classes to return a string of html
        attributes.  There is an ignore parameter that allows special attributes from being included.*/
    public function getAttributes($ignore = "")
    {
        $str = "";

        if (!empty($this->attributes)) {
            if (!is_array($ignore)) {
                $ignore = array($ignore);
            }

            $attributes = array_diff(array_keys($this->attributes), $ignore);

            foreach ($attributes as $attribute) {
                $str .= ' ' . $attribute;

                if ($this->attributes[$attribute] !== "") {
                    $str .= '="' . $this->filter($this->attributes[$attribute]) . '"';
                }
            }
        }

        return $str;
    }

    public function appendAttribute($attribute, $value)
    {
        if (isset($this->attributes)) {
            if (!empty($this->attributes[$attribute])) {
                $this->attributes[$attribute] .= " " . $value;
            } else {
                $this->attributes[$attribute] = $value;
            }
        }
    }

    public function setAttribute($attribute, $value)
    {
        if (isset($this->attributes)) {
            $this->attributes[$attribute] = $value;
        }
    }
}
