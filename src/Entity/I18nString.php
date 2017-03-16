<?php
namespace Fei\Service\Translate\Entity;

use Fei\Entity\AbstractEntity;

/**
 * Class I18nString
 *
 * @Entity
 * @Table(uniqueConstraints={@UniqueConstraint(name="key_namespace",columns={"key", "namespace", "lang"})})
 *
 * @package Fei\Service\Translate\Entity
 */
class I18nString extends AbstractEntity
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
     * @var \DateTime
     *
     * @Column(type="datetime")
     */
    protected $createdAt;

    /**
     * @var string
     *
     * @Column(type="string", length=5)
     */
    protected $lang;

    /**
     * @var string
     *
     * @Column(name="`key`", type="string")
     */
    protected $key;

    /**
     * @var string
     *
     * @Column(type="string")
     */
    protected $namespace;

    /**
     * @var string
     *
     * @Column(type="text")
     */
    protected $content;

    public function __construct($data = null)
    {
        $this->setCreatedAt(new \DateTime());

        parent::__construct($data);
    }

    /**
     * Get Id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set Id
     *
     * @param int $id
     *
     * @return I18nString
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get CreatedAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set CreatedAt
     *
     * @param mixed $createdAt
     *
     * @return I18nString
     */
    public function setCreatedAt($createdAt)
    {
        if (!$createdAt instanceof \DateTime) {
            $createdAt = new \DateTime($createdAt);
        }

        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get Lang
     *
     * @return string
     */
    public function getLang()
    {
        return $this->lang;
    }

    /**
     * Set Lang
     *
     * @param string $lang
     *
     * @return I18nString
     */
    public function setLang($lang)
    {
        $this->lang = $lang;

        return $this;
    }

    /**
     * Get Key
     *
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * Set Key
     *
     * @param string $key
     *
     * @return I18nString
     */
    public function setKey($key)
    {
        $this->key = $key;

        return $this;
    }

    /**
     * Get Namespace
     *
     * @return string
     */
    public function getNamespace()
    {
        return $this->namespace;
    }

    /**
     * Set Namespace
     *
     * @param string $namespace
     *
     * @return I18nString
     */
    public function setNamespace($namespace)
    {
        $this->namespace = $namespace;

        return $this;
    }

    /**
     * Get Content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set Content
     *
     * @param string $content
     *
     * @return $this
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    public function __toString()
    {
        return $this->getContent();
    }
}
