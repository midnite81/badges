<?php

namespace Midnite81\Badges\Type;

class Gitter extends BadgeType
{

    /**
     * This returns the url template for the badge type
     *
     * @return string
     */
    public function urlTemplate()
    {
        return 'https://gitter.im/$GITTER_ROOM$/?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge';
    }

    /**
     * This returns the image url template for the badge type
     *
     * @return string
     */
    public function imageUrlTemplate()
    {
        return 'https://badges.gitter.im/Join%20Chat.svg';
    }

    /**
     * This is the alternative text for the badge
     *
     * @return string
     */
    public function alternativeText()
    {
        return 'Join the chat at https://gitter.im/$GITTER_ROOM$';
    }

    /**
     * Required Attributes
     *
     * @return array
     */
    public function requiredAttributes()
    {
        return [
            '$GITTER_ROOM$'
        ];
    }
}