<?php

namespace Midnite81\Badges\Tests;

use Midnite81\Badges\Badges;
use Midnite81\Badges\Type\Licence;
use Midnite81\Badges\Writer;
use PHPUnit\Framework\TestCase;

class BadgesTest extends TestCase
{
    /**
     * @test
     */
    public function it_instantiates()
    {
        $badge = $this->getInstance();

        $this->assertInstanceOf(Badges::class, $badge);
    }

    /**
     * @test
     */
    public function it_factory_instantiates()
    {
        $badge = $this->getFactoryInstance();

        $this->assertInstanceOf(Badges::class, $badge);
    }

    /**
     * @test
     */
    public function it_returns_latest_stable_version()
    {
        $badge = $this->getInstance()->latestStableVersion();

        $this->assertInstanceOf(Writer::class, $badge);
        $this->assertInternalType('string', $badge->toHtml());
        $this->assertInternalType('string', $badge->toMarkdown());
        $this->assertContains('<a href', $badge->toHtml());
        $this->assertContains('[![', $badge->toMarkdown());
    }

    /**
     * @test
     */
    public function it_returns_total_download()
    {
        $badge = $this->getInstance()->totalDownloads();

        $this->assertInstanceOf(Writer::class, $badge);
        $this->assertInternalType('string', $badge->toHtml());
        $this->assertInternalType('string', $badge->toMarkdown());
        $this->assertContains('<a href', $badge->toHtml());
        $this->assertContains('[![', $badge->toMarkdown());
    }

    /**
     * @test
     */
    public function it_returns_latest_unstable_version()
    {
        $badge = $this->getInstance()->latestUnstableVersion();

        $this->assertInstanceOf(Writer::class, $badge);
        $this->assertInternalType('string', $badge->toHtml());
        $this->assertInternalType('string', $badge->toMarkdown());
        $this->assertContains('<a href', $badge->toHtml());
        $this->assertContains('[![', $badge->toMarkdown());
    }

    /**
     * @test
     */
    public function it_returns_licence()
    {
        $badge = $this->getInstance()->licence();

        $this->assertInstanceOf(Writer::class, $badge);
        $this->assertInternalType('string', $badge->toHtml());
        $this->assertInternalType('string', $badge->toMarkdown());
        $this->assertContains('<a href', $badge->toHtml());
        $this->assertContains('[![', $badge->toMarkdown());
    }

    /**
     * @test
     */
    public function it_returns_build()
    {
        $badge = $this->getInstance()->build();

        $this->assertInstanceOf(Writer::class, $badge);
        $this->assertInternalType('string', $badge->toHtml());
        $this->assertInternalType('string', $badge->toMarkdown());
        $this->assertContains('<a href', $badge->toHtml());
        $this->assertContains('[![', $badge->toMarkdown());
    }

    /**
     * @test
     */
    public function it_returns_coverage_status()
    {
        $badge = $this->getInstance()->coverageStatus();

        $this->assertInstanceOf(Writer::class, $badge);
        $this->assertInternalType('string', $badge->toHtml());
        $this->assertInternalType('string', $badge->toMarkdown());
        $this->assertContains('<a href', $badge->toHtml());
        $this->assertContains('[![', $badge->toMarkdown());
    }

    /**
     * @test
     */
    public function it_returns_style_ci()
    {
        $badge = $this->getInstance()->styleCi();

        $this->assertInstanceOf(Writer::class, $badge);
        $this->assertInternalType('string', $badge->toHtml());
        $this->assertInternalType('string', $badge->toMarkdown());
        $this->assertContains('<a href', $badge->toHtml());
        $this->assertContains('[![', $badge->toMarkdown());
    }

    /**
     * @test
     */
    public function it_returns_writer_from_get_method()
    {
        $badge = $this->getInstance()->get(Licence::class);

        $this->assertInstanceOf(Writer::class, $badge);
        $this->assertInternalType('string', $badge->toHtml());
        $this->assertInternalType('string', $badge->toMarkdown());
        $this->assertContains('<a href', $badge->toHtml());
        $this->assertContains('[![', $badge->toMarkdown());
    }
    
     /**
      * @test
      * @expectedException \Midnite81\Badges\Exceptions\ClassShouldBeInstanceOfBadgeType
      */
     public function it_throws_exception_if_class_is_not_type_of_badge_type()
     {
         $badge = $this->getInstance()->get(TestClass::class);
     }


    /**
     * Get Instance
     *
     * @param array $attributes
     * @return Badges
     */
    protected function getInstance($attributes = [])
    {
        $attributes = (! empty($attributes)) ? $attributes : [
            '$PACKAGE_NAME$' => 'test/test',
            '$STYLE_CI$' => '12345'
        ];
        return new Badges($attributes);
    }

    /**
     * Get Factory Instance
     *
     * @param array $attributes
     * @return static
     */
    public function getFactoryInstance($attributes = [])
    {
        $attributes = (! empty($attributes)) ? $attributes : [
            '$PACKAGE_NAME$' => 'test/test',
            '$STYLE_CI$' => '12345'
        ];
        return Badges::create($attributes);
    }

}