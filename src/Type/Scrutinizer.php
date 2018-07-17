<?php

namespace Midnite81\Badges\Type;

class Scrutinizer extends BadgeType
{

    /**
     * This returns the url template for the badge type
     *
     * @return string
     */
    public function urlTemplate()
    {
        return 'https://scrutinizer-ci.com/g/$PACKAGE_NAME$';
    }

    /**
     * This returns the image url template for the badge type
     *
     * @return string
     */
    public function imageUrlTemplate()
    {
        return 'https://img.shields.io/scrutinizer/g/$PACKAGE_NAME$.svg';
    }

    /**
     * This is the alternative text for the badge
     *
     * @return string
     */
    public function alternativeText()
    {
        return 'Quality Score';
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