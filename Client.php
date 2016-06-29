<?php
namespace molchanovvg\ping;
use yii\log\Logger;
class Client
{
    public function post($url, $request)
    {
        $header = [
            "POST " . $url . " HTTP/1.0",
            "Content-type: text/xml",
            "Content-length: " . strlen($request)
        ];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $request);
        $data = curl_exec($ch);
        if (curl_errno($ch)) {
            \Yii::getLogger()->log('An error occurred: ' . curl_error($ch), Logger::LEVEL_WARNING);
        } else {
            curl_close($ch);
            return $data;
        }
    }
}