<?php

namespace spec\Dreesen\Image;

use Dreesen\Image\HexCamo;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * @mixin HexCamo
 */
class HexCamoSpec extends ObjectBehavior
{
    const BASE_URL = 'https://test.camo';
    const HMAC_KEY = 'secret';

    function let()
    {
        $this->beConstructedWith(self::BASE_URL, self::HMAC_KEY);
    }

    function it_should_implement_camo()
    {
        $this->shouldImplement('Dreesen\Image\Camo');
    }

    function it_should_prepend_the_camo_server_base_url()
    {
        $this->camouflage('http://test.dev')->shouldStartWith(self::BASE_URL);
    }

    function it_should_generate_the_signature_using_the_hmac_key()
    {
        $url = 'http://test.dev';
        $signature = hash_hmac('sha1', $url, self::HMAC_KEY, false);

        $this->camouflage($url)->shouldMatch('/' . $signature . '/');
    }

    function it_should_encode_the_target_url_in_hex_format()
    {
        $url = 'http://test.dev';
        $encoded = bin2hex($url);

        $this->camouflage($url)->shouldEndWith($encoded);
    }

    function it_should_return_a_url_in_correct_format()
    {
        $expected = sprintf('~^%s/[0-9a-f]{40}/[0-9a-f]+$~', preg_quote(self::BASE_URL, '~'));

        $this->camouflage('http://test.dev')->shouldMatch($expected);
    }
}
