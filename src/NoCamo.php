<?php

namespace Dreesen\Image;

/**
 * Disables image camouflage by returning given URLs as they are.
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
