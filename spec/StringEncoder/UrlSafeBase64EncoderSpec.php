<?php

namespace spec\Dreesen\Image\StringEncoder;

use Dreesen\Image\StringEncoder;
use Dreesen\Image\StringEncoder\UrlSafeBase64Encoder;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * @mixin UrlSafeBase64Encoder
 */
class UrlSafeBase64EncoderSpec extends ObjectBehavior
{
    function it_should_implement_string_encoder_interface()
    {
        $this->shouldImplement(StringEncoder::class);
    }

    function it_should_encode_given_string_in_url_safe_base64_format()
    {
        $input = 'http://example.com/image.jpg';
        $expected = 'aHR0cDovL2V4YW1wbGUuY29tL2ltYWdlLmpwZw';

        $this->encodeString($input)->shouldReturn($expected);
    }
}
