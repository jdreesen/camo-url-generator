<?php

namespace Dreesen\Image;

/**
 * Digest generator interface.
 */
interface DigestGenerator
{
    /**
     * Generates a raw digest for the given input.
     *
     * @param string $input The input
     *
     * @return string The raw digest
     */
    public function generateDigest($input);
}
