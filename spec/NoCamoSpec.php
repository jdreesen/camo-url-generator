<?php

namespace spec\Dreesen\Image;

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
        $this->shouldImplement('Dreesen\Image\Camo');
    }

    function it_should_not_camouflage_urls()
    {
        $url = 'http://test.dev';

        $this->camouflage($url)->shouldReturn($url);
    }
}
