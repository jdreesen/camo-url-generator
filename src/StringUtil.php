<?php

namespace Dreesen\Image;

/**
 * String utilities.
 */
final class StringUtil
{
    /**
     * Base64 encodes a string as URL safe.
     *
     * @param string $input The input to encode
     *
     * @return string The encoded string
     */
    public static function urlsafeBase64Encode($input)
    {
        return rtrim(strtr(base64_encode($input), '+/', '-_'), '=');
    }

    private function __construct()
    {
        // no instances
    }
}
