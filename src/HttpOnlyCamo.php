<?php

namespace Dreesen\Image;

/**
 * Decorator to only camouflage HTTP (non-secure) URLs.
 */
final class HttpOnlyCamo implements Camo
{
    /** @var Camo */
    private $delegate;

    /**
     * @param Camo $delegate The delegate Camo instance
     */
    public function __construct(Camo $delegate)
    {
        $this->delegate = $delegate;
    }

    /**
     * Generates a signed camo URL if scheme is HTTP.
     *
     * @param string $url The URL to camouflage
     *
     * @return string The (proxy) URL
     */
    public function camouflage($url)
    {
        if (0 === stripos($url, 'http://')) {
            return $this->delegate->camouflage($url);
        }

        return $url;
    }
}
