<?php
/**
 * Created by JetBrains PhpStorm.
 * User: chipx
 * Date: 20.03.13
 * Time: 8:59
 * To change this template use File | Settings | File Templates.
 */

class ParserFeedTest extends CDbTestCase {

    public function testHabr()
    {
        $feed = new Feeds();
        $feed->name = "Habrahabr";
        $feed->url = "http://habrahabr.ru/rss/hubs/";
        $feed->type_parse = 'rss_2_0';

        $parser = new ParserFeed();

        $result = $parser->parse($feed);

        $this->assertNotNull($result);

        $xml = $this->getXml($feed->url);

        $this->assertEquals($xml->channel->title, $result->title);
        $this->assertEquals($xml->channel->pubDate, $result->released);
        var_dump($xml->channel->item[0]->description);
    }

    protected function getXml($url)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $data = curl_exec($ch);
        curl_close($ch);
        return simplexml_load_string($data);
    }
}
