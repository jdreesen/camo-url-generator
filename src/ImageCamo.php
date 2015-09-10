<?php

namespace Dreesen\Image;

/**
 * Generates camouflaged URLs for usage with the camo or go-camo image proxies.
 *
 * @see https://github.com/atmos/camo
 * @see https://github.com/cactus/go-camo
 */
final class ImageCamo implements Camo
{
    /** @var string */
    private $serverBaseUrl;

    /** @var UriFormatter */
    private $uriFormatter;

    /** @var DigestGenerator */
    private $digestGenerator;

    /**
     * Constructor.
     *
     * @param string          $serverBaseUrl   The URL of the camo server
     * @param UriFormatter    $uriFormatter    The UriFormatter to use
     * @param DigestGenerator $digestGenerator The DigestGenerator to use
     *
     * @throws \DomainException When $serverBaseUrl is no HTTPS URL
     */
    public function __construct($serverBaseUrl, UriFormatter $uriFormatter, DigestGenerator $digestGenerator)
    {
        if (0 !== stripos($serverBaseUrl, 'https://')) {
            throw new \DomainException('$serverBaseUrl must be a secure HTTPS URL.');
        }

        $this->serverBaseUrl = rtrim($serverBaseUrl, '/') . '/';
        $this->uriFormatter = $uriFormatter;
        $this->digestGenerator = $digestGenerator;
    }

    /**
     * Generates a signed camo URL.
     *
     * @param string $targetUrl The URL to camouflage
     *
     * @return string The camouflaged URL
     */
    public function camouflage($targetUrl)
    {
        $digest = $this->digestGenerator->generateDigest($targetUrl);
        $camoUri = $this->uriFormatter->formatUri($targetUrl, $digest);

        return $this->serverBaseUrl . ltrim($camoUri, '/');
    }
}
