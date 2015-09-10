<?php

namespace Dreesen\Image\StringEncoder;

use Dreesen\Image\StringEncoder;

/**
 * Hex Encoder.
 */
final class HexEncoder implements StringEncoder
{
    /**
     * Encodes given input in HEX format.
     *
     * @param string $input The input to encode
     *
     * @return string The encoded input
     */
    public function encodeString($input)
    {
        return bin2hex($input);
    }
}
