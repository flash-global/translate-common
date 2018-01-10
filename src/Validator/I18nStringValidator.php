<?php
namespace Fei\Service\Translate\Validator;

use Fei\Entity\EntityInterface;
use Fei\Entity\Validator\AbstractValidator;
use Fei\Entity\Validator\Exception;
use Fei\Service\Translate\Entity\I18nString;

class I18nStringValidator extends AbstractValidator
{
    /**
     * {@inheritdoc}
     */
    public function validate(EntityInterface $entity)
    {
        if (!$entity instanceof I18nString) {
            throw new Exception(sprintf('The entity to validate must be an instance of %s', I18nString::class));
        }

        $this->validateCreatedAt($entity->getCreatedAt());
        $this->validateLang($entity->getLang());
        $this->validateKey($entity->getKey());
        $this->validateNamespace($entity->getNamespace());
        $this->validateContent($entity->getContent());

        return empty($this->getErrors());
    }

    /**
     * Validate createdAt
     *
     * @param mixed $createdAt
     *
     * @return bool
     */
    public function validateCreatedAt($createdAt)
    {
        if (empty($createdAt)) {
            $this->addError('createdAt', 'Creation date and time cannot be empty');
            return false;
        }

        if (!$createdAt instanceof \DateTime) {
            $this->addError('createdAt', 'The creation date has to be and instance of \DateTime');
            return false;
        }

        return true;
    }

    /**
     * Validate lang
     *
     * @param string $lang
     *
     * @return bool
     */
    public function validateLang($lang)
    {
        if (!preg_match('/^[a-z]{2}(_[A-Z]{2})?$/', $lang)) {
            $this->addError('lang', 'Lang has to be a locale formatted string (en or en_GB)');
            return false;
        }

        return true;
    }

    /**
     * Validate key
     *
     * @param string $key
     *
     * @return bool
     */
    public function validateKey($key)
    {
        $length = strlen((string) $key);

        if (!$length) {
            $this->addError('key', 'Key cannot be empty');
            return false;
        }

        return true;
    }

    /**
     * Validate namespace
     *
     * @param string $namespace
     *
     * @return bool
     */
    public function validateNamespace($namespace)
    {
        if (empty($namespace)) {
            $this->addError('namespace', 'Namespace cannot be empty');
            return false;
        }

        if (substr($namespace, 0, 1) !== '/') {
            $this->addError('namespace', 'The namespace have to start with the character "/".');
            return false;
        }

        if (strlen($namespace) > 255) {
            $this->addError('namespace', 'Namespace length cannot exceed 255 chars');
            return false;
        }

        return true;
    }

    /**
     * Validate content
     *
     * @param string $content
     *
     * @return bool
     */
    public function validateContent($content)
    {
        if (empty($content)) {
            $this->addError('content', 'Content cannot be empty');
            return false;
        }

        return true;
    }
}
