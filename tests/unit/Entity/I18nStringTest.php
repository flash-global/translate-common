<?php
namespace Tests\Translate\Entity;

use Codeception\Test\Unit;
use Fei\Service\Translate\Entity\I18nString;

/**
 * Class I18nStringTest
 */
class I18nStringTest extends Unit
{
    public function testIdAccessors()
    {
        $i18nString = new I18nString();
        $i18nString->setId(1);

        $this->assertEquals(1, $i18nString->getId());
        $this->assertAttributeEquals($i18nString->getId(), 'id', $i18nString);
    }

    public function testCreatedAtAccessors()
    {
        $i18nString = new I18nString();
        $i18nString->setCreatedAt($expected = new \DateTime());

        $this->assertEquals($expected, $i18nString->getCreatedAt());
        $this->assertAttributeEquals($i18nString->getCreatedAt(), 'createdAt', $i18nString);
    }

    public function testCreatedAtSetterWhenNotADatetime()
    {
        $i18nString = new I18nString();
        $i18nString->setCreatedAt('2016-12-12');

        $this->assertEquals(new \DateTime('2016-12-12'), $i18nString->getCreatedAt());
    }

    public function testLangAccessors()
    {
        $i18nString = new I18nString();
        $i18nString->setLang('en_GB');
        
        $this->assertEquals('en_GB', $i18nString->getLang());
        $this->assertAttributeEquals($i18nString->getLang(), 'lang', $i18nString);
    }

    public function testKeyAccessors()
    {
        $i18nString = new I18nString();
        $i18nString->setKey('TEXT_TO_TRANSLATE');

        $this->assertEquals('TEXT_TO_TRANSLATE', $i18nString->getKey());
        $this->assertAttributeEquals($i18nString->getKey(), 'key', $i18nString);
    }

    public function testNamespaceAccessors()
    {
        $i18nString = new I18nString();
        $i18nString->setNamespace('This/Is/One/Namespace');

        $this->assertEquals('This/Is/One/Namespace', $i18nString->getNamespace());
        $this->assertAttributeEquals($i18nString->getNamespace(), 'namespace', $i18nString);
    }

    public function testContentAccessors()
    {
        $i18nString = new I18nString();
        $i18nString->setContent('content');

        $this->assertEquals('content', $i18nString->getContent());
        $this->assertAttributeEquals($i18nString->getContent(), 'content', $i18nString);
    }

    public function testToStringMagicMethod()
    {
        $i18nString = new I18nString();
        $i18nString->setContent('fake-content');

        $this->assertEquals('fake-content', (string)$i18nString);
    }
}
