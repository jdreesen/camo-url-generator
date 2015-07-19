<?php

namespace Dreesen\Image;

/**
 * Use this class to disable image camouflage.
 */
final class NoCamo implements Camo
{
    /**
     * Returns the given URL as is.
     *
     * @param string $url The URL
     *
     * @return string The URL
     */
    public function camouflage($url)
    {
        return $url;
    }
}
