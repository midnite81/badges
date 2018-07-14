<?php

namespace Midnite81\Badges\Type;

class LatestUnstableVersion extends BadgeType
{
    /**
     * This returns the url template for the badge type
     *
     * @return string
     */
    public function imageUrlTemplate()
    {
        return 'https://poser.pugx.org/$PACKAGE_NAME$/v/unstable';
    }

    /**
     * This returns the url template for the badge type
     *
     * @return string
     */
    public function urlTemplate()
    {
        return 'https://packagist.org/packages/$PACKAGE_NAME$';
    }

    /**
     * This is the alternative text for the badge
     *
     * @return string
     */
    public function alternativeText()
    {
        return 'Latest Unstable Version';
    }

    /**
     * Required Attributes
     *
     * @return array
     */
    public function requiredAttributes()
    {
        return [
            '$PACKAGE_NAME$'
        ];
    }
}