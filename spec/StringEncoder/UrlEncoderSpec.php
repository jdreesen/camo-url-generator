<?php

namespace spec\Dreesen\Image\StringEncoder;

use Dreesen\Image\StringEncoder;
use Dreesen\Image\StringEncoder\UrlEncoder;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * @mixin UrlEncoder
 */
class UrlEncoderSpec extends ObjectBehavior
{
    function it_should_implement_string_encoder_interface()
    {
        $this->shouldImplement(StringEncoder::class);
    }

    function it_should_raw_url_encode_given_string()
    {
        $input = 'input';
        $expected = rawurlencode($input);

        $this->encodeString($input)->shouldReturn($expected);
    }
}
