<?php

namespace spec\Dreesen\Image;

use Dreesen\Image\Camo;
use Dreesen\Image\DigestGenerator;
use Dreesen\Image\ImageCamo;
use Dreesen\Image\UriFormatter;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * @mixin ImageCamo
 */
class ImageCamoSpec extends ObjectBehavior
{
    const SERVER_URL = 'https://example.com';

    function let(UriFormatter $uriFormatter, DigestGenerator $digestGenerator)
    {
        $this->beConstructedWith(self::SERVER_URL, $uriFormatter, $digestGenerator);
    }

    function it_should_implement_camo_interface()
    {
        $this->shouldImplement(Camo::class);
    }

    function it_should_append_a_slash_to_the_server_url() {
        $this->camouflage('')->shouldReturn(self::SERVER_URL . '/');
    }

    function it_should_generate_the_camo_url_using_target_url_and_digest(
        UriFormatter $uriFormatter,
        DigestGenerator $digestGenerator
    ) {
        $targetUrl = 'http://example.com/image.jpg';
        $urlDigest = '1234567890abcdef';
        $expected = self::SERVER_URL . '/' . $urlDigest . '/' . $targetUrl;

        $digestGenerator->generateDigest($targetUrl)->willReturn($urlDigest);
        $uriFormatter->formatUri($targetUrl, $urlDigest)->willReturn($urlDigest . '/' . $targetUrl);

        $this->camouflage($targetUrl)->shouldReturn($expected);
    }
}
