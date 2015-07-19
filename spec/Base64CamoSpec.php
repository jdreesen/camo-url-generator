<?php

namespace spec\Dreesen\Image;

use Dreesen\Image\Base64Camo;
use Dreesen\Image\StringUtil;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * @mixin Base64Camo
 */
class Base64CamoSpec extends ObjectBehavior
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

    function it_should_prepend_the_camo_servers_base_url()
    {
        $this->camouflage('http://test.dev')->shouldStartWith(self::BASE_URL);
    }

    function it_should_generate_the_signature_using_the_hmac_key_and_encode_it_with_url_safe_base64()
    {
        $url = 'http://test.dev';
        $signature = StringUtil::urlsafeBase64Encode(hash_hmac('sha1', $url, self::HMAC_KEY, true));

        $this->camouflage($url)->shouldMatch('/' . $signature . '/');
    }

    function it_should_encode_the_target_url_in_url_safe_base64_format()
    {
        $url = 'http://test.dev';
        $encoded = StringUtil::urlsafeBase64Encode($url);

        $this->camouflage($url)->shouldEndWith($encoded);
    }
}
