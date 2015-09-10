<?php

namespace Dreesen\Image;

/**
 * String encoder interface.
 */
interface StringEncoder
{
    /**
     * Encodes strings to a specific format.
     *
     * @param string $input The string to encode
     *
     * @return string The encoded string
     */
    public function encodeString($input);
}
