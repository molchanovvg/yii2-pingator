<?php

namespace molchanovvg\ping;
use yii\log\Logger;
class Yandex extends Client implements Pingable
{
    public $serverUrl = 'http://ping.blogs.yandex.ru/RPC2';
    /**
     * Ping
     *
     * @param string $siteName
     * @param string $homepage
     * @param string $url
     * @param string $rss
     * @param string $encoding
     * @return boolean
     */
    public function ping($siteName, $homepage, $url, $rss, $encoding = 'UTF-8')
    {
        $request = xmlrpc_encode_request(
            'weblogUpdates.Ping', // без extended
            array($siteName, $homepage, $url, $rss),
            ['encoding' => $encoding]
        );
        $response = $this->post($this->serverUrl, $request);
        $result = strpos($response, "<boolean>0</boolean>") ? true : false;
        if ($result) {
            \Yii::getLogger()->log('Ping Yandex success.', Logger::LEVEL_WARNING);
        }else{
            \Yii::getLogger()->log('Ping Yandex failure.', Logger::LEVEL_WARNING);
        }
    }
}