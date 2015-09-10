<?php

namespace Dreesen\Image\StringEncoder;

use Dreesen\Image\StringEncoder;

/**
 * Url safe base64 encoder.
 */
final class UrlSafeBase64Encoder implements StringEncoder
{
    /**
     * Encodes given input in URL safe base64 format.
     *
     * @param string $input The input to encode
     *
     * @return string The encoded input
     */
    public function encodeString($input)
    {
        return rtrim(strtr(base64_encode($input), '+/', '-_'), '=');
    }
}
