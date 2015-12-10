## Arastta Form Component

Form component provides rapid development of forms through an object-oriented PHP structure.

## Elements

It can create a variety of elements including Textboxes, Textareas, Checkboxes, Selectboxes, Date inputs, Color inputs and so on. The current version has more than 34 elements. Additionaly, it has support for 13 HTML 5 form elements: Phone, Search, Url, Email, DateTime, Date, Month, Week, Time, DateTimeLocal, Number, Range, and Color. Each of these fallback to textboxes in the event that the HTML5 input type isn't supported in the user's web browser.

## Validation

For browsers that support HTML5 it will do simple client side data validation before the form is submitted (for example, required field). But most of validations are server-sided based (look at Validation classes inside Validation folder). To do the server side validation you must call the method isValid() when the form is submitted, redirecting the page if it returns false. In this case, when the form is show again, it will be automatically filled with data recovered from the user session, and validation errors will be presented in red.

## Views

With the Views functionality it is possible to arrange form elements in horizontal, vertical, inline or search layouts.

## Usage

```php
use Arastta\Component\Form\Form;
use Arastta\Component\Form\Element;

$options = array("Option #1", "Option #2", "Option #3");

$form = new Form("my-form");

$form->addElement(new Element\Hidden("form", "form-elements"));
$form->addElement(new Element\HTML('<legend>Standard</legend>'));
$form->addElement(new Element\Textbox("Textbox:", "Textbox"));
$form->addElement(new Element\Password("Password:", "Password"));
$form->addElement(new Element\File("File:", "File"));
$form->addElement(new Element\Textarea("Textarea:", "Textarea"));
$form->addElement(new Element\Select("Select:", "Select", $options));
$form->addElement(new Element\Radio("Radio Buttons:", "RadioButtons", $options));
$form->addElement(new Element\Checkbox("Checkboxes:", "Checkboxes", $options));
$form->addElement(new Element\HTML('<legend>HTML5</legend>'));
$form->addElement(new Element\Phone("Phone:", "Phone"));
$form->addElement(new Element\Search("Search:", "Search"));
$form->addElement(new Element\Url("Url:", "Url"));
$form->addElement(new Element\Email("Email:", "Email"));
$form->addElement(new Element\Date("Date:", "Date"));
$form->addElement(new Element\DateTime("DateTime:", "DateTime"));
$form->addElement(new Element\DateTimeLocal("DateTime-Local:", "DateTimeLocal"));
$form->addElement(new Element\Month("Month:", "Month"));
$form->addElement(new Element\Week("Week:", "Week"));
$form->addElement(new Element\Time("Time:", "Time"));
$form->addElement(new Element\Number("Number:", "Number"));
$form->addElement(new Element\Range("Range:", "Range"));
$form->addElement(new Element\Color("Color:", "Color"));
$form->addElement(new Element\HTML('<legend>jQuery UI</legend>'));
$form->addElement(new Element\JQueryUIDate("Date:", "JQueryUIDate"));
$form->addElement(new Element\Checksort("Checksort:", "Checksort", $options));
$form->addElement(new Element\Sort("Sort:", "Sort", $options));
$form->addElement(new Element\HTML('<legend>Custom/Other</legend>'));
$form->addElement(new Element\State("State:", "State"));
$form->addElement(new Element\Country("Country:", "Country"));
$form->addElement(new Element\YesNo("Yes/No:", "YesNo"));
$form->addElement(new Element\Captcha("Captcha:"));
$form->addElement(new Element\Button);
$form->addElement(new Element\Button("Cancel", "button", array(
    "onclick" => "history.go(-1);"
)));

$form->render();
```

## Installation via Composer

Add `"arastta/form": "~1.0"` to the require block in your composer.json and then run `composer install`.

```json
{
	"require": {
		"arastta/form": "~1.0"
	}
}
```

Alternatively, you can simply run the following from the command line:

```sh
composer require arastta/form "~1.0"
```

## License
This project is based on PFBC (PHP Form Builder Class) and released under the [GPLv3 license](LICENSE.txt).
