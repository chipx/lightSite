<?php
/**
 * Created by JetBrains PhpStorm.
 * User: chipx
 * Date: 20.03.13
 * Time: 9:15
 * To change this template use File | Settings | File Templates.
 */

abstract class ParserFeed_Main extends CComponent {
    protected function getXML($url)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
    }

    abstract public function parse($url, $lastTime);

}