<?php

namespace Fei\Service\Translate\Entity;

use Fei\Entity\AbstractEntity;

/**
 * Class Language
 *
 * @Entity
 *
 * @package Fei\Service\Translate\Entity
 */
class Language extends AbstractEntity
{
    /**
     * @var int
     *
     * @Id
     * @GeneratedValue(strategy="AUTO")
     * @Column(type="integer")
     */
    protected $id;

    /**
     * @var string
     *
     * @Column(type="string")
     */
    protected $name;

    /**
     * @var string
     *
     * @Column(type="string", name="`short_name`")
     */
    protected $shortName;

    /**
     * @var string
     *
     * @Column(type="string", nullable=true)
     */
    protected $fallback;

    /**
     * @var bool
     *
     * @Column(type="boolean", name="`enabled`")
     */
    protected $enabled;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Language
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Language
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getShortName()
    {
        return $this->shortName;
    }

    /**
     * @param string $shortName
     * @return Language
     */
    public function setShortName($shortName)
    {
        $this->shortName = $shortName;
        return $this;
    }

    /**
     * @return string
     */
    public function getFallback()
    {
        return $this->fallback;
    }

    /**
     * @param string $fallback
     * @return Language
     */
    public function setFallback($fallback)
    {
        $this->fallback = $fallback;
        return $this;
    }

    /**
     * @return bool
     */
    public function isEnabled()
    {
        return $this->enabled;
    }

    /**
     * @param bool $enabled
     * @return Language
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;
        return $this;
    }
}
