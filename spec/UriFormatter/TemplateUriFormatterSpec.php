<?php

namespace spec\Dreesen\Image\UriFormatter;

use Dreesen\Image\StringEncoder;
use Dreesen\Image\UriFormatter;
use Dreesen\Image\UriFormatter\TemplateUriFormatter;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * @mixin TemplateUriFormatter
 */
class TemplateUriFormatterSpec extends ObjectBehavior
{
    function let(StringEncoder $targetUrlEncoder, StringEncoder $signatureEncoder)
    {
        $this->beConstructedWith('{signature}/{target-url}', $targetUrlEncoder, $signatureEncoder);
    }

    function it_should_implement_url_generator_interface()
    {
        $this->shouldImplement(UriFormatter::class);
    }

    function it_should_encode_digest_and_target_url(
        StringEncoder $targetUrlEncoder,
        StringEncoder $signatureEncoder
    ) {
        $targetUrl = 'http://example.com/image.jpg';
        $digest = 'digest';
        $expected = $digest . '/' . $targetUrl;

        $targetUrlEncoder->encodeString($targetUrl)->willReturnArgument(0);
        $signatureEncoder->encodeString($digest)->willReturnArgument(0);

        $this->formatUri($targetUrl, $digest)->shouldReturn($expected);
    }
}
