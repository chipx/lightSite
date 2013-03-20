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

        $this->assertNotEmpty($result);
    }
}
