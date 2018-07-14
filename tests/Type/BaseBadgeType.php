<?php

namespace Midnite81\Badges\Tests\Type;

use Midnite81\Badges\Type\BadgeType;
use PHPUnit\Framework\TestCase;

abstract class BaseBadgeType extends TestCase
{
    protected $attributes = [
        '$PACKAGE_NAME$' => 'test/test'
    ];

    /**
     * @test
     */
    public function it_constructs()
    {
        $this->assertInstanceOf(BadgeType::class, $this->getInstance());
    }

    /**
     * @test
     */
    public function it_constructs_through_factory_method()
    {
        $this->assertInstanceOf(BadgeType::class, $this->getFactoryInstance());
    }
    
     /**
      * @test
      * @expectedException \Midnite81\Badges\Exceptions\RequiredAttributeNotPassed
      */
     public function it_throws_exception_when_required_parameters_are_not_passed()
     {
         $this->getInstance(['foo' => 'bar']);
     }

     /**
      * @test
      */
     public function it_returns_the_url_template()
     {
         $method = $this->getInstance()->urlTemplate();

         $this->assertInternalType('string', $method);
         $this->contains('http', $method);
         $this->contains('$PACKAGE_NAME$', $method);
     }

    /**
     * @test
     */
    public function it_returns_the_image_url_template()
    {
        $method = $this->getInstance()->imageUrlTemplate();

        $this->assertInternalType('string', $method);
        $this->contains('http', $method);
        $this->contains('$PACKAGE_NAME$', $method);
    }

    /**
     * @test
     */
    public function it_returns_the_alternative_text()
    {
        $method = $this->getInstance()->alternativeText();

        $this->assertInternalType('string', $method);
        $this->contains('http', $method);
    }
    
    /** 
     * @test 
     */
    public function it_provides_the_required_attributes_as_an_array()
    {
        $method = $this->getInstance()->requiredAttributes();

        $this->assertInternalType('array', $method);
        $this->assertContains('$PACKAGE_NAME$', $method);
    }

    /**
     * @test
     */
    public function it_returns_passed_url()
    {
        $method = $this->getInstance()->getUrlTemplate();

        $this->assertInternalType('string', $method);
        $this->assertContains('test/test', $method);
        $this->assertContains('http', $method);
    }

    /**
     * @test
     */
    public function it_returns_passed_image_url()
    {
        $method = $this->getInstance()->getImageUrl();

        $this->assertInternalType('string', $method);
        $this->assertContains('test/test', $method);
        $this->assertContains('http', $method);
    }

    /**
     * @test
     */
    public function it_returns_alternative_text()
    {
        $method = $this->getInstance()->getAlternativeText();

        $this->assertInternalType('string', $method);
    }
    
    /** 
     * @test 
     */
    public function it_returns_the_html_template() 
    {
        //
        $method = $this->getInstance()->getHtmlTemplate();

        $this->assertInternalType('string', $method);
        $this->assertContains('test/test', $method);
        $this->assertContains('<a href', $method);
    }

    /**
     * @test
     */
    public function it_returns_the_markdown_template()
    {
        $method = $this->getInstance()->getMarkdownTemplate();

        $this->assertInternalType('string', $method);
        $this->assertContains('test/test', $method);
        $this->assertContains('[![', $method);
    }
    
    public function it_returns_the_default_to_string_string()
    {
        //
        $method = $this->getInstance()->default();

        $this->assertInternalType('string', $method);
        $this->assertContains('html', $method);
    }

    /**
     * Get instance of class
     *
     * @param $attributes
     * @return BadgeType
     */
    abstract protected function getInstance($attributes);

    /**
     * Get factory instance of class
     *
     * @param $attributes
     * @return BadgeType
     */
    abstract protected function getFactoryInstance($attributes);
}