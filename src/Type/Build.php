<?php

namespace Midnite81\Badges\Type;

class Build extends BadgeType
{
    /**
     * This returns the url template for the badge type
     *
     * @return string
     */
    public function imageUrlTemplate()
    {
        return 'https://travis-ci.org/$PACKAGE_NAME$.svg?branch=master';
    }

    /**
     * This returns the url template for the badge type
     *
     * @return string
     */
    public function urlTemplate()
    {
        return 'https://travis-ci.org/$PACKAGE_NAME$';
    }

    /**
     * This is the alternative text for the badge
     *
     * @return string
     */
    public function alternativeText()
    {
        return 'Build';
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