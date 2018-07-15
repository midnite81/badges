<?php

namespace Midnite81\Badges\Type;

class StyleCI extends BadgeType
{

    /**
     * This returns the url template for the badge type
     *
     * @return string
     */
    public function urlTemplate()
    {
        return 'https://styleci.io/repos/$STYLE_CI$';
    }

    /**
     * This returns the image url template for the badge type
     *
     * @return string
     */
    public function imageUrlTemplate()
    {
        return 'https://styleci.io/repos/$STYLE_CI$/shield';
    }

    /**
     * This is the alternative text for the badge
     *
     * @return string
     */
    public function alternativeText()
    {
        return 'StyleCI Status';
    }

    /**
     * Required Attributes
     *
     * @return array
     */
    public function requiredAttributes()
    {
        return [
            '$STYLE_CI$'
        ];
    }
}