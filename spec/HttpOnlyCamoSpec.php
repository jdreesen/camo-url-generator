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
    const CAMOUFLAGED_URL = 'https://test.camo';

    function let(Camo $delegate)
    {
        $delegate->camouflage(Argument::type('string'))->willReturn(self::CAMOUFLAGED_URL);

        $this->beConstructedWith($delegate);
    }

    function it_should_implement_camo()
    {
        $this->shouldImplement('Dreesen\Image\Camo');
    }

    function it_should_camouflage_urls_with_http_scheme()
    {
        $this->camouflage('http://test.dev')->shouldReturn(self::CAMOUFLAGED_URL);
    }

    function it_should_camouflage_urls_without_scheme()
    {
        $this->camouflage('test.dev')->shouldReturn(self::CAMOUFLAGED_URL);
    }

    function it_should_not_camouflage_urls_with_https_scheme()
    {
        $url = 'https://test.dev';

        $this->camouflage($url)->shouldReturn($url);
    }
}
