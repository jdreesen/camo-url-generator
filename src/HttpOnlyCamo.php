<?php

namespace Dreesen\Image;

/**
 * Decorator that only camouflages HTTP (non-secure) URLs.
 */
final class HttpOnlyCamo implements Camo
{
    /** @var Camo */
    private $delegate;

    /**
     * @param Camo $delegate The delegate camouflage instance
     */
    public function __construct(Camo $delegate)
    {
        $this->delegate = $delegate;
    }

    /**
     * Generates a signed camo URL if scheme is HTTP or no scheme given (implicitly HTTP).
     *
     * @param string $url The URL to camouflage
     *
     * @return string The (proxy) URL
     */
    public function camouflage($url)
    {
        if (0 === stripos($url, 'http://') || 0 !== stripos($url, 'http')) {
            return $this->delegate->camouflage($url);
        }

        return $url;
    }
}
