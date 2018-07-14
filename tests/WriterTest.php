<?php
namespace Midnite81\Badges\Tests;

use Midnite81\Badges\Type\BadgeType;
use Midnite81\Badges\Type\LatestStableVersion;
use Midnite81\Badges\Writer;
use PHPUnit\Framework\TestCase;

class WriterTest extends TestCase
{
    protected $badgeType;

    protected $writer;

    public function setUp()
    {
        $this->badgeType = $this->instanceOfBadgeType();
        $this->writer = $this->instanceOfWriter();

    }

    /**
     * @test
     */
    public function it_outputs_to_html()
    {
        $this->assertInternalType('string', $this->writer->toHtml());
        $this->assertContains('test/test', $this->writer->toHtml());
        $this->assertNotContains('$PACKAGE_NAME$', $this->writer->toHtml());
        $this->assertContains('<a href', $this->writer->toHtml());
    }

    /**
     * @test
     */
    public function it_outputs_to_markdown()
    {
        $this->assertInternalType('string', $this->writer->toMarkdown());
        $this->assertContains('test/test', $this->writer->toMarkdown());
        $this->assertNotContains('$PACKAGE_NAME$', $this->writer->toMarkdown());
        $this->assertContains('[![', $this->writer->toMarkdown());
    }

    /**
     * @test
     */
    public function it_outputs_default_to_string()
    {
        $writerToString = $this->writer . '';

        $this->assertInternalType('string', $writerToString);
        $this->assertContains('test/test', $writerToString);
        $this->assertNotContains('$PACKAGE_NAME$', $writerToString);
        $this->assertContains('<a href', $writerToString);
    }

    /**
     * Instance of Badge Type
     *
     * @return LatestStableVersion
     * @throws \Midnite81\Badges\Exceptions\RequiredAttributeNotPassed
     */
    protected function instanceOfBadgeType()
    {
        return new LatestStableVersion(['$PACKAGE_NAME$' => 'test/test']);
    }

    /**
     * Instance of Writer
     *
     * @param null $badgeTypeInstance
     * @return Writer
     * @throws \Midnite81\Badges\Exceptions\RequiredAttributeNotPassed
     */
    protected function instanceOfWriter($badgeTypeInstance = null)
    {
        if ($badgeTypeInstance instanceof BadgeType) {
            return new Writer($badgeTypeInstance);
        }
        return new Writer($this->instanceOfBadgeType());
    }
}