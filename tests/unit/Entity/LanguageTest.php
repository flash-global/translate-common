<?php

namespace Tests\Translate\Entity;

use Codeception\Test\Unit;
use Fei\Service\Translate\Entity\Language;

class LanguageTest extends Unit
{
    public function testGetSet()
    {
        $language = new Language();

        $fieldValues = [
            'id' => 1,
            'name' => 'French',
            'shortName' => 'FR',
        ];

        foreach ($fieldValues as $field => $value) {
            $language->{'set' . ucfirst($field)}($value);
        }

        foreach ($fieldValues as $field => $value) {
            $this->assertEquals($value, $language->{'get' . ucfirst($field)}());
        }

        $language->setEnabled(true);

        $this->assertEquals(true, $language->isEnabled());
    }
}