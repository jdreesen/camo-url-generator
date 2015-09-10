<?php

namespace Dreesen\Image\UriFormatter;

use Dreesen\Image\StringEncoder;
use Dreesen\Image\UriFormatter;

final class TemplateUriFormatter implements UriFormatter
{
    const URI_PART = [
        'targetUrl' => '{target-url}',
        'signature' => '{signature}',
    ];

    /** @var string */
    private $uriTemplate;

    /** @var StringEncoder */
    private $targetUrlEncoder;

    /** @var StringEncoder */
    private $signatureEncoder;

    /**
     * Constructor.
     *
     * @param string        $uriTemplate      The URI template that will be used for formatting
     *                                        Must contain the parts: {target-url} and {signature}
     * @param StringEncoder $targetUrlEncoder The StringEncoder to use for target URL encoding
     * @param StringEncoder $signatureEncoder The StringEncoder to use for signature encoding
     */
    public function __construct($uriTemplate, StringEncoder $targetUrlEncoder, StringEncoder $signatureEncoder)
    {
        $this->targetUrlEncoder = $targetUrlEncoder;
        $this->signatureEncoder = $signatureEncoder;
        $this->uriTemplate = $uriTemplate;
    }

    /**
     * Formats camo URIs using target URL and its signature.
     *
     * @param string $targetUrl The target URL
     * @param string $signature The signature of the target URL
     *
     * @return string The resulting URI
     */
    public function formatUri($targetUrl, $signature)
    {
        return strtr($this->uriTemplate, [
            self::URI_PART['targetUrl'] => $this->targetUrlEncoder->encodeString($targetUrl),
            self::URI_PART['signature'] => $this->signatureEncoder->encodeString($signature),
        ]);
    }
}
