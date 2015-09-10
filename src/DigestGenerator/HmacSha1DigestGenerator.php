<?php

namespace Dreesen\Image\DigestGenerator;

use Dreesen\Image\DigestGenerator;

/**
 * Raw HMAC-SHA1 digest generator.
 */
final class HmacSha1DigestGenerator implements DigestGenerator
{
    /** @var string */
    private $hmacKey;

    /**
     * Constructor.
     *
     * @param string $hmacKey The key to use for digest generation
     */
    public function __construct($hmacKey)
    {
        $this->hmacKey = $hmacKey;
    }

    /**
     * Generates raw HMAC-SHA1 digests from the given input.
     *
     * @param string $input The input
     *
     * @return string The raw digest
     */
    public function generateDigest($input)
    {
        return hash_hmac('sha1', $input, $this->hmacKey, true);
    }
}
