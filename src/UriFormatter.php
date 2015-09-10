<?php

namespace Dreesen\Image;

/**
 * URI formatter interface.
 */
interface UriFormatter
{
    /**
     * Formats camo URIs using target URL and its signature.
     *
     * The camo server's base URL should be prepended to the outcome of this method.
     *
     * @param string $targetUrl The target URL
     * @param string $signature Raw signature of the target URL
     *
     * @return string The resulting URI
     */
    public function formatUri($targetUrl, $signature);
}
