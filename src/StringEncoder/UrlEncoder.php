<?php

namespace Dreesen\Image\StringEncoder;

use Dreesen\Image\StringEncoder;

/**
 * RFC 1738 URL encoder.
 */
final class UrlEncoder implements StringEncoder
{
    /**
     * Encodes given input in RFC 1738 compatible format.
     *
     * @param string $input The input to encode
     *
     * @return string The encoded input
     */
    public function encodeString($input)
    {
        return rawurlencode($input);
    }
}
