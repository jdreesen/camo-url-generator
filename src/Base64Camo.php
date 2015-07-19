<?php

namespace Dreesen\Image;

/**
 * Generates URLs for the use with the go-camo image proxy in Base64 format.
 *
 * @see https://github.com/cactus/go-camo
 */
final class Base64Camo implements Camo
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
     * Generates a signed camo URL in Base64 format.
     *
     * @param string $url The URL to camouflage
     *
     * @return string The proxy URL
     */
    public function camouflage($url)
    {
        $signature = StringUtil::urlsafeBase64Encode($this->generateSignature($url));
        $encodedUrl = StringUtil::urlsafeBase64Encode($url);

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
        return $this->camoBaseUrl . '/' . $signature . '/' . $encodedUrl;
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
        return hash_hmac('sha1', $input, $this->hmacKey, true);
    }
}
