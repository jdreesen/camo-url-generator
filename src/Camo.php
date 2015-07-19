<?php

namespace Dreesen\Image;

/**
 * Image camouflage.
 *
 * Can be used to proxy (non-secure) images via TLS.
 */
interface Camo
{
    /**
     * Generates a signed camo URL.
     *
     * @param string $url The URL to camouflage
     *
     * @return string The proxy URL
     */
    public function camouflage($url);
}
