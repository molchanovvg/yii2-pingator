<?php
namespace  molchanovvg\ping;

use \yii\base\Component;

class Ping extends Component
{
    public $servers = [
        'molchanovvg\Ping\Yandex',
        'molchanovvg\Ping\Google',
    ];

    /**
     * @param $siteName
     * @param $homepage
     * @param $url
     * @param $rss
     * @param string $encoding
     * @param null $servers
     */
    public function send($siteName, $homepage, $url, $rss, $encoding = "UTF-8", $servers = null)
    {
        $servers = $this->getServers($servers);
        foreach ($servers as $server) {
            $client = new $server;
            $client->ping($siteName, $homepage, $url, $rss, $encoding = "UTF-8");
        }
    }
    /**
     * @param null|array $servers
     * @return array
     */
    public function getServers($servers = null)
    {
        if ($servers == null) {
            return array_values($this->$servers);
        } else {
            $result = [];
            foreach ($servers as $k => $server) {
                if (isset($this->$servers[$k])) {
                    $result[] = $this->$servers[$k];
                }
            }
            return $result;
        }
    }
}