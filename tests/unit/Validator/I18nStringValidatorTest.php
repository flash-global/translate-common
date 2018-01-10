<?php
namespace Tests\Translate\Validator;

use Codeception\Test\Unit;
use Codeception\Util\Stub;
use Fei\Entity\AbstractEntity;
use Fei\Entity\Validator\Exception;
use Fei\Service\Translate\Entity\I18nString;
use Fei\Service\Translate\Validator\I18nStringValidator;

class I18nStringValidatorTest extends Unit
{
    public function testValidate()
    {
        $i18nString = (new I18nString())
            ->setLang('fr_FR')
            ->setKey('KEY')
            ->setCreatedAt(new \DateTime())
            ->setContent('Content')
            ->setNamespace('/My/Namespace');

        $validator = new I18nStringValidator();
        $results = $validator->validate($i18nString);

        $this->assertTrue($results);
        $this->assertEmpty($validator->getErrors());
    }

    public function testValidateWhenItIsNotAnInstanceOfI18nString()
    {
        $validator = new I18nStringValidator();

        $this->expectException(Exception::class);
        $this->expectExceptionMessage('The entity to validate must be an instance of ' . I18nString::class);

        $validator->validate(new class extends AbstractEntity {

        });
    }

    public function testValidateCreatedAt()
    {
        $validatorStub = Stub::make(I18nStringValidator::class, [
            'addError' => Stub::exactly(2)
        ], $this);

        $this->assertTrue($validatorStub->validateCreatedAt(new \DateTime()));
        $this->assertFalse($validatorStub->validateCreatedAt(0)); // error because it's empty

        // error because not an instance of \Datetime
        $this->assertFalse($validatorStub->validateCreatedAt('1970-01-01'));
    }

    public function testValidateLang()
    {
        $validatorStub = Stub::make(I18nStringValidator::class, [
            'addError' => Stub::exactly(5)
        ], $this);

        $this->assertTrue($validatorStub->validateLang('fr_FR'));
        $this->assertTrue($validatorStub->validateLang('fr'));

        // only these two formats are correct : fr and fr_FR
        $this->assertFalse($validatorStub->validateLang('FR_FR'));
        $this->assertFalse($validatorStub->validateLang('fr_fr'));
        $this->assertFalse($validatorStub->validateLang('fr-FR'));
        $this->assertFalse($validatorStub->validateLang('fr_FRA'));
        $this->assertFalse($validatorStub->validateLang(''));
    }

    public function testValidateKey()
    {
        $validatorStub = Stub::make(I18nStringValidator::class, [
            'addError' => Stub::exactly(2)
        ], $this);

        $this->assertTrue($validatorStub->validateKey('KEY'));
        $this->assertFalse($validatorStub->validateKey(''));
        $this->assertFalse($validatorStub->validateKey(false));
        $this->assertTrue($validatorStub->validateKey('/Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras tristique mauris in orci tincidunt feugiat. Nullam eget orci ac diam blandit hendrerit. Donec et ultricies augue, sed molestie justo. Maecenas elit dui, faucibus et orci eget, ullamcorper gravida'));
    }

    public function testValidateNamespace()
    {
        $validatorStub = Stub::make(I18nStringValidator::class, [
            'addError' => Stub::exactly(4)
        ], $this);

        $this->assertTrue($validatorStub->validateNamespace('/My/Namespace'));
        $this->assertTrue($validatorStub->validateNamespace('/0'));
        $this->assertFalse($validatorStub->validateNamespace(''));
        $this->assertFalse($validatorStub->validateNamespace(false));
        $this->assertFalse($validatorStub->validateNamespace('My/Namespace'));
        $this->assertFalse($validatorStub->validateNamespace('/Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras tristique mauris in orci tincidunt feugiat. Nullam eget orci ac diam blandit hendrerit. Donec et ultricies augue, sed molestie justo. Maecenas elit dui, faucibus et orci eget, ullamcorper gravida'));
    }

    public function testValidateContent()
    {
        $validatorStub = Stub::make(I18nStringValidator::class, [
            'addError' => Stub::exactly(1)
        ], $this);

        $this->assertTrue($validatorStub->validateContent('My Content'));
        $this->assertFalse($validatorStub->validateContent(''));
    }
}
