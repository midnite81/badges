<?php
namespace Midnite81\Badges;

use Midnite81\Badges\Exceptions\ClassShouldBeInstanceOfBadgeType;
use Midnite81\Badges\Type\BadgeType;
use Midnite81\Badges\Type\Build;
use Midnite81\Badges\Type\CoverageStatus;
use Midnite81\Badges\Type\LatestStableVersion;
use Midnite81\Badges\Type\LatestUnstableVersion;
use Midnite81\Badges\Type\Licence;
use Midnite81\Badges\Type\TotalDownload;

class Badges
{
    /**
     * @var array
     */
    protected $attributes;

    /**
     * Badges constructor.
     *
     * @param array $attributes
     */
    public function __construct($attributes = [])
    {
        $this->attributes = $attributes;
    }

    /**
     * Factory Create Method
     *
     * @param $attributes
     * @return static
     */
    public static function create($attributes = [])
    {
        return new static($attributes);
    }

    /**
     * Get Latest Stable Version
     *
     * @return Writer
     * @throws Exceptions\RequiredAttributeNotPassed
     */
    public function latestStableVersion()
    {
        return new Writer(new LatestStableVersion($this->attributes));
    }

    /**
     * Total Downloads
     *
     * @return Writer
     * @throws Exceptions\RequiredAttributeNotPassed
     */
    public function totalDownloads()
    {
        return new Writer(new TotalDownload($this->attributes));
    }

    /**
     * Latest Unstable Version
     *
     * @return Writer
     * @throws Exceptions\RequiredAttributeNotPassed
     */
    public function latestUnstableVersion()
    {
        return new Writer(new LatestUnstableVersion($this->attributes));
    }

    /**
     * Licence
     *
     * @return Writer
     * @throws Exceptions\RequiredAttributeNotPassed
     */
    public function licence()
    {
        return new Writer(new Licence($this->attributes));
    }

    /**
     * Build
     *
     * @return Writer
     * @throws Exceptions\RequiredAttributeNotPassed
     */
    public function build()
    {
        return new Writer(new Build($this->attributes));
    }

    /**
     * Get Coverage Status
     *
     * @return Writer
     * @throws Exceptions\RequiredAttributeNotPassed
     */
    public function coverageStatus()
    {
        return new Writer(new CoverageStatus($this->attributes));
    }

    /**
     * Get Misc Badge
     *
     * @param $badgeClass
     * @return Writer
     * @throws ClassShouldBeInstanceOfBadgeType
     */
    public function get($badgeClassName)
    {
        $badgeClass = $badgeClassName::create($this->attributes);

        if ($badgeClass instanceof BadgeType) {
            return new Writer($badgeClass);
        }
        throw new ClassShouldBeInstanceOfBadgeType("$badgeClassName is not an instance of BadgeType");
    }
}