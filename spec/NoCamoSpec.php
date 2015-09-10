<?php

namespace spec\Dreesen\Image;

use Dreesen\Image\Camo;
use Dreesen\Image\NoCamo;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * @mixin NoCamo
 */
class NoCamoSpec extends ObjectBehavior
{
    function it_should_implement_camo()
    {
        $this->shouldImplement(Camo::class);
    }

    function it_should_not_camouflage_urls()
    {
        $url = 'http://example.com/image.jpg';

        $this->camouflage($url)->shouldReturn($url);
    }
}
