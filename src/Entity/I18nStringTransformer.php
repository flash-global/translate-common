<?php
namespace Fei\Service\Translate\Entity;

use League\Fractal\TransformerAbstract;

/**
 * Class I18nStringTransformer
 *
 * @package Fei\Service\Translate\Entity
 */
class I18nStringTransformer extends TransformerAbstract
{
    public function transform(I18nString $i18nString)
    {
        return [
            'id' => (int)$i18nString->getId(),
            'createdAt' => $i18nString->getCreatedAt()->format(\DateTime::ISO8601),
            'lang' => $i18nString->getLang(),
            'key' => $i18nString->getKey(),
            'namespace' => $i18nString->getNamespace(),
            'content' => $i18nString->getContent()
        ];
    }
}
