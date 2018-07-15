<?php

namespace Midnite81\Badges\Tests\Type;

use Midnite81\Badges\Type\BadgeType;
use Midnite81\Badges\Type\Gitter;

class GitterTest extends BaseBadgeType
{
    public function it_returns_passed_image_url()
    {
        $method = $this->getInstance()->getImageUrl();

        $this->assertInternalType('string', $method);
        $this->assertContains('http', $method);
    }
    
    public function it_returns_the_image_url_template()
    {
        $method = $this->getInstance()->imageUrlTemplate();

        $this->assertInternalType('string', $method);
        $this->assertContains('http', $method);
    }
    
    /**
     * Get instance of class
     *
     * @param $attributes
     * @return BadgeType
     * @throws \Midnite81\Badges\Exceptions\RequiredAttributeNotPassed
     */
    protected function getInstance($attributes = null)
    {
        $attributes = (! empty($attributes) && is_array($attributes)) ? $attributes : $this->attributes;
        return new Gitter($attributes);
    }

    /**
     * Get factory instance of class
     *
     * @param $attributes
     * @return BadgeType
     * @throws \Midnite81\Badges\Exceptions\RequiredAttributeNotPassed
     */
    protected function getFactoryInstance($attributes = null)
    {
        $attributes = (! empty($attributes) && is_array($attributes)) ? $attributes : $this->attributes;
        return Gitter::create($attributes);
    }
}