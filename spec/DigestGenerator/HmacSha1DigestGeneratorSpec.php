<?php

namespace spec\Dreesen\Image\DigestGenerator;

use Dreesen\Image\DigestGenerator;
use Dreesen\Image\DigestGenerator\HmacSha1DigestGenerator;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * @mixin HmacSha1DigestGenerator
 */
class HmacSha1DigestGeneratorSpec extends ObjectBehavior
{
    const HMAC_KEY = '1234567890';

    function let()
    {
        $this->beConstructedWith(self::HMAC_KEY);
    }

    function it_should_implement_digest_generator_interface()
    {
        $this->shouldImplement(DigestGenerator::class);
    }

    function it_should_generate_raw_hmac_sha1_digests_using_given_key()
    {
        $input = 'input';
        $expected = hash_hmac('sha1', $input, self::HMAC_KEY, true);

        $this->generateDigest($input)->shouldReturn($expected);
    }
}
