<?php

namespace Midnite81\Badges;

use Midnite81\Badges\Type\BadgeType;

class Writer
{
    /**
     * @var BadgeType
     */
    protected $badge;

    /**
     * Writer constructor.
     *
     * @param BadgeType $badge
     */
    public function __construct(BadgeType $badge)
    {
        $this->badge = $badge;
    }

    /**
     * Return HTML
     *
     * @return string
     */
    public function toHtml()
    {
        return $this->badge->getHtmlTemplate();
    }

    /**
     * Return Markdown
     *
     * @return string
     */
    public function toMarkdown()
    {
        return $this->badge->getMarkdownTemplate();
    }

    /**
     * To string method
     */
    public function __toString()
    {
        if ($this->badge->default() == 'markdown') {
            return $this->toMarkdown();
        }
        return $this->toHtml();
    }
}