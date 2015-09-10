<?php

namespace spec\Dreesen\Image\StringEncoder;

use Dreesen\Image\StringEncoder;
use Dreesen\Image\StringEncoder\HexEncoder;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * @mixin HexEncoder
 */
class HexEncoderSpec extends ObjectBehavior
{
    function it_should_implement_string_encoder_interface()
    {
        $this->shouldImplement(StringEncoder::class);
    }

    function it_should_encode_given_string_in_hex_format()
    {
        $input = 'input';
        $expected = bin2hex($input);

        $this->encodeString($input)->shouldReturn($expected);
    }
}
