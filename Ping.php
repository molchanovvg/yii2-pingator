<?php
namespace  molchanovvg\ping;

use \yii\base\Component;

class Ping extends Component
{
    /**
     * @param $siteName
     * @param $homepage
     * @param $url
     * @param $rss
     * @param string $encoding
     * @param null $servers
     */
    public function send($siteName, $homepage, $url, $rss, $encoding = "UTF-8", $servers)
    {
        foreach ($servers as $server) {
            $client = new $server;
            $client->ping($siteName, $homepage, $url, $rss, $encoding);
        }
    }
}