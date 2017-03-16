<?php
namespace Tests\Translate\Entity;

use Codeception\Test\Unit;
use Fei\Service\Translate\Entity\I18nString;
use Fei\Service\Translate\Entity\I18nStringTransformer;

class I18nStringTransformerTest extends Unit
{
    public function testTransform()
    {
        $i18nStringMock = $this->getMockBuilder(I18nString::class)->setMethods([
            'getId',
            'getCreatedAt',
            'getLang',
            'getKey',
            'getNamespace',
            'getContent'
        ])->getMock();

        $i18nStringMock->expects($this->once())->method('getId')->willReturn(1);
        $i18nStringMock->expects($this->once())->method('getCreatedAt')->willReturn(new \DateTime());
        $i18nStringMock->expects($this->once())->method('getLang')->willReturn('en_GB');
        $i18nStringMock->expects($this->once())->method('getKey')->willReturn('KEY');
        $i18nStringMock->expects($this->once())->method('getNamespace')->willReturn('My/Namespace');
        $i18nStringMock->expects($this->once())->method('getContent')->willReturn('Content');

        $i18nStringTransformer = new I18nStringTransformer($i18nStringMock);
        $results = $i18nStringTransformer->transform($i18nStringMock);

        $this->assertEquals([
            'id' => 1,
            'createdAt' => (new \DateTime())->format(\DateTime::ISO8601),
            'lang' => 'en_GB',
            'key' => 'KEY',
            'namespace' => 'My/Namespace',
            'content' => 'Content'
        ], $results);
    }
}
