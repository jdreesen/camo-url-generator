<?php

namespace spec\Dreesen\Image;

use Dreesen\Image\Camo;
use Dreesen\Image\HttpOnlyCamo;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * @mixin HttpOnlyCamo
 */
class HttpOnlyCamoSpec extends ObjectBehavior
{
    const CAMOUFLAGED_URL = 'https://example.com/?parameters';

    function let(Camo $delegate)
    {
        $delegate->camouflage(Argument::type('string'))->willReturn(self::CAMOUFLAGED_URL);

        $this->beConstructedWith($delegate);
    }

    function it_should_implement_camo()
    {
        $this->shouldImplement(Camo::class);
    }

    function it_should_camouflage_urls_with_http_scheme()
    {
        $this->camouflage('http://example.com/image.jpg')->shouldReturn(self::CAMOUFLAGED_URL);
    }

    function it_should_not_camouflage_urls_with_https_scheme()
    {
        $url = 'https://example.com/image.jpg';

        $this->camouflage($url)->shouldReturn($url);
    }
}
