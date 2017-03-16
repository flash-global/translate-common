# Translate common

This is the Translate Common elements package which contains:
                                       
* Translate Entity and transformer
* Translate Entity validator
* Related classes

# Installation and Requirement
  
Translate Client needs PHP 5.5 or higher.

Add this requirement to your `composer.json: "fei/translate-common": : "^1.0"`

Or execute `composer.phar require fei/translate-common` in your terminal.

# Usage

## Entity and classes

### I18nString entity

In addition to traditional `id` and `createdAt` fields, I18nString entity has **four** important properties:

| Properties    | Type              |
|---------------|-------------------|
| id            | `integer`         |
| createdAt     | `datetime`        |
| lang             | `string`          |
| key           | `string`          |
| namespace     | `string`         |
| content       | `string`         |

* `lang` is a string indicating the language of the translation. It can be formatted either with two chars or with 5. For example you could have `fr` or `fr_FR`
* `key` is a string representing the key used to refer to this translation
* `namespace` is a string representing the namespace of the translation. For example, you could have `/project/pricer/invoices`
* `content` is a string representing the content of your translation

## Other tools

### I18nString validator

You have the possibility to validate a `I18nString` entity with I18nStringValidator class:

```php
<?php

use Fei\Service\Translate\Validator\I18nStringValidator;
use Fei\Service\Translate\Entity\I18nString;

$stringValidator = new I18nStringValidator();
$string = new I18nString();

//validate returns true if your I18nString instance is valid, or false in the other case
$isStringValid = $stringValidator->validate($string);

//getErrors() allows you to get an array of errors if there are some, or an empty array in the other case
$errors = $stringValidator->getErrors();

```

By default, all `I18nString` properties must not be empty, but you're also able to validate only a few properties of your entity, using validate methods:

```php
<?php

use Fei\Service\Translate\Validator\I18nStringValidator;
use Fei\Service\Translate\Entity\I18nString;

$stringValidator = new I18nStringValidator();

$string = new I18nString();
$string->setNamespace('/pricer');
$string->setContent('Hello world');
$string->setKey('HELLO_WORLD');
$string->setLang('en_GB');

$stringValidator->validateContent($string->getContent());
$stringValidator->validateCreatedAt($string->getCreatedAt());
$stringValidator->validateKey($string->getKey());
$stringValidator->validateLang($string->getLang());
$stringValidator->validateNamespace($string->getNamespace());

// will return an empty array : all of our definitions are correct
$errors = $stringValidator->getErrors();
echo empty($errors); // true

// contentType can not be empty, let's try to set it as an empty string
$string->setContent('');
$stringValidator->validateContent($string->getContent());

// this time you'll get a non-empty array
$errors = $stringValidator->getErrors();

echo empty($errors); // false
print_r($errors);

/**
* print_r will return:
*
*    Array
*    (
*        ['content'] => Array
*            (
*                'Content cannot be empty'
*            )
*    )
**/
```
