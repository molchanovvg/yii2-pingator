<?php

namespace molchanovvg\ping;
interface Pingable
{
    /**
     * Ping search engine
     *
     * @param string $siteName
     * @param string $homepage
     * @param string $url
     * @param string $rss
     * @return boolean
     */
    public function ping($siteName, $homepage, $url, $rss);
}