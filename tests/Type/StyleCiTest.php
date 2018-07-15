<?php

namespace Midnite81\Badges\Tests\Type;

use Midnite81\Badges\Type\BadgeType;
use Midnite81\Badges\Type\Build;
use Midnite81\Badges\Type\StyleCI;

class StyleCiTest extends BaseBadgeType
{

    /**
     * @test
     */
    public function it_returns_the_url_template()
    {
        $method = $this->getInstance()->urlTemplate();

        $this->assertInternalType('string', $method);
        $this->assertContains('http', $method);
        $this->assertContains('$STYLE_CI$', $method);
    }

    /**
     * @test
     */
    public function it_returns_the_image_url_template()
    {
        $method = $this->getInstance()->imageUrlTemplate();

        $this->assertInternalType('string', $method);
        $this->assertContains('http', $method);
        $this->assertContains('$STYLE_CI$', $method);
    }

    /**
     * @test
     */
    public function it_provides_the_required_attributes_as_an_array()
    {
        $method = $this->getInstance()->requiredAttributes();

        $this->assertInternalType('array', $method);
        $this->assertContains('$STYLE_CI$', $method);
    }

    /**
     * @test
     */
    public function it_returns_passed_url()
    {
        $method = $this->getInstance()->getUrlTemplate();

        $this->assertInternalType('string', $method);
        $this->assertContains('12345', $method);
        $this->assertContains('http', $method);
    }

    /**
     * @test
     */
    public function it_returns_the_markdown_template()
    {
        $method = $this->getInstance()->getMarkdownTemplate();

        $this->assertInternalType('string', $method);
        $this->assertContains('12345', $method);
        $this->assertContains('[![', $method);
    }

    /**
     * @test
     */
    public function it_returns_passed_image_url()
    {
        $method = $this->getInstance()->getImageUrl();

        $this->assertInternalType('string', $method);
        $this->assertContains('12345', $method);
        $this->assertContains('http', $method);
    }

    /**
     * @test
     */
    public function it_returns_the_html_template()
    {
        //
        $method = $this->getInstance()->getHtmlTemplate();

        $this->assertInternalType('string', $method);
        $this->assertContains('12345', $method);
        $this->assertContains('<a href', $method);
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
        return new StyleCI($attributes);
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
        return StyleCI::create($attributes);
    }
}