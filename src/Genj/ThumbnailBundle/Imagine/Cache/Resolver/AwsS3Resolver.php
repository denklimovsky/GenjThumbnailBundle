<?php
/**
 * Created by PhpStorm.
 * User: nicokaag
 * Date: 16/12/15
 * Time: 18:30
 */

namespace Genj\ThumbnailBundle\Imagine\Cache\Resolver;

use Liip\ImagineBundle\Imagine\Cache\Resolver\AwsS3Resolver as BaseAwsS3Resolver;

class AwsS3Resolver extends BaseAwsS3Resolver
{
    /**
     * Override to return just the path itself. We determine our path using the routing, so there is no need to change
     * the path here.
     *
     * @param string $path
     * @param string $filter
     *
     * @return string
     */
    protected function getFileUrl($path, $filter)
    {
        return $path;
    }

    /**
     * Returns the object path within the bucket.
     *
     * @param string $path   The base path of the resource.
     * @param string $filter The name of the imagine filter in effect.
     *
     * @return string The path of the object on S3.
     */
    protected function getObjectPath($path, $filter)
    {
        $path = $this->cachePrefix
            ? sprintf('%s/%s', $this->cachePrefix, $path)
            : $path;

        return str_replace('//', '/', $path);
    }
}