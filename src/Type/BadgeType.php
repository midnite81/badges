<?php

namespace Midnite81\Badges\Type;

use Midnite81\Badges\Exceptions\RequiredAttributeNotPassed;

abstract class BadgeType
{
    /**
     * @var array
     */
    protected $attributes;

    /**
     * @var string
     */
    protected $default;

    /**
     * BadgeType constructor.
     *
     * @param array $attributes
     * @throws RequiredAttributeNotPassed
     */
    public function __construct($attributes = [])
    {
        $this->attributes = $attributes;
        $this->checkForRequiredAttributes();
    }

    /**
     * Static function method
     *
     * @param array $attributes
     * @return static
     * @throws RequiredAttributeNotPassed
     */
    public static function create($attributes = [])
    {
        return new static($attributes);
    }

    /**
     * This returns the url template for the badge type
     *
     * @return string
     */
    abstract public function urlTemplate();

    /**
     * This returns the image url template for the badge type
     *
     * @return string
     */
    abstract public function imageUrlTemplate();

    /**
     * This is the alternative text for the badge
     *
     * @return string
     */
    abstract public function alternativeText();

    /**
     * Get the URL
     *
     * @return string
     */
    public function getUrlTemplate()
    {
        return $this->convertString($this->urlTemplate());
    }

    /**
     * Get the image URL
     *
     * @return string
     */
    public function getImageUrl()
    {
        return $this->convertString($this->imageUrlTemplate());
    }

    /**
     * Get the Alternative Text
     *
     * @return string
     */
    public function getAlternativeText()
    {
        return $this->convertString($this->alternativeText());
    }

    /**
     * Required Attributes
     *
     * @return array
     */
    abstract public function requiredAttributes();

    /**
     * Get HTML Template
     *
     * @return mixed
     */
    public function getHtmlTemplate()
    {
        return "<a href=\"{$this->getUrlTemplate()}\"><img src=\"{$this->getImageUrl()}\" alt=\"{$this->getAlternativeText()}\"></a>";
    }


    /**
     * Get Markdown Template
     *
     * @return mixed
     */
    public function getMarkdownTemplate()
    {
        return "[![{$this->getAlternativeText()}]({$this->getImageUrl()})]({$this->getUrlTemplate()})";
    }

    /**
     * Return whether to default response to html or markdown
     *
     * @return string
     */
    public function default()
    {
        return 'html';
    }


    /**
     * Checks required attributes are in the passed attributes
     *
     * @throws RequiredAttributeNotPassed
     */
    protected function checkForRequiredAttributes()
    {
        if (! empty($this->requiredAttributes())) {
            foreach ($this->requiredAttributes() as $requiredAttribute) {
                if (! array_key_exists($requiredAttribute, $this->attributes)) {
                    throw new RequiredAttributeNotPassed("The required attribute $requiredAttribute was not passed");
                }
            }
        }
    }

    /**
     * Convert template
     *
     * @param $string
     * @return mixed
     */
    protected function convertString($string)
    {
        if (! empty($this->attributes)) {
            foreach ($this->attributes as $key=>$attribute) {
                $string = str_replace($key, $attribute, $string);
            }
        }

        return $string;
    }
}