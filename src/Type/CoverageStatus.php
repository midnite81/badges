<?php

namespace Midnite81\Badges\Type;

class CoverageStatus extends BadgeType
{
    /**
     * This returns the url template for the badge type
     *
     * @return string
     */
    public function imageUrlTemplate()
    {
        return 'https://coveralls.io/repos/github/$PACKAGE_NAME$/badge.svg?branch=master';
    }

    /**
     * This returns the url template for the badge type
     *
     * @return string
     */
    public function urlTemplate()
    {
        return 'https://coveralls.io/github/$PACKAGE_NAME$?branch=master';
    }

    /**
     * This is the alternative text for the badge
     *
     * @return string
     */
    public function alternativeText()
    {
        return 'Coverage Status';
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