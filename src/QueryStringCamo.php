<?php

namespace Dreesen\Image;

/**
 * Generates URLs for usage with the camo image proxy in query string format.
 *
 * @see https://github.com/atmos/camo
 */
final class QueryStringCamo implements Camo
{
    /** @var string */
    private $camoBaseUrl;

    /** @var string */
    private $hmacKey;

    /**
     * Constructor.
     *
     * @param string $camoBaseUrl The base URL of the camo server
     * @param string $hmacKey     The key used for creating the HMAC signature
     */
    public function __construct($camoBaseUrl, $hmacKey)
    {
        $this->camoBaseUrl = rtrim($camoBaseUrl, '/');
        $this->hmacKey = $hmacKey;
    }

    /**
     * Generates a signed camo URL.
     *
     * @param string $url The URL to camouflage
     *
     * @return string The proxy URL
     */
    public function camouflage($url)
    {
        $signature = $this->generateSignature($url);
        $encodedUrl = rawurlencode($url);

        return $this->generateCamoUrl($signature, $encodedUrl);
    }

    /**
     * Generates the full camo URL.
     *
     * @param string $signature  The HMAC signature
     * @param string $encodedUrl The encoded URL
     *
     * @return string The full camo URL
     */
    private function generateCamoUrl($signature, $encodedUrl)
    {
        return $this->camoBaseUrl . '/' . $signature . '?url=' . $encodedUrl;
    }

    /**
     * Generates the HMAC signature.
     *
     * @param string $input The input to generate the signature for
     *
     * @return string The HMAC signature
     */
    private function generateSignature($input)
    {
        return hash_hmac('sha1', $input, $this->hmacKey, false);
    }
}
