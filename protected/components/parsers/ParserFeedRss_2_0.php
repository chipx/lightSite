<?php
/**
 * Created by JetBrains PhpStorm.
 * User: chipx
 * Date: 20.03.13
 * Time: 9:20
 * To change this template use File | Settings | File Templates.
 */

class ParserFeedRss_2_0 extends ParserFeed_Main{
    protected $_items;

    public function __construct($xml)
    {
        parent::__construct($xml);
        $this->_items = $this->_xml->channel->item;
    }

    public function isNew($dateTtime)
    {
        $xmlTime = strtotime($this->_xml->channel->pubDate);
        return $xmlTime > $dateTtime;
    }

    public function getDescription()
    {
        return $this->_xml->channel->description;
    }

    public function getTitle()
    {
        return $this->_xml->channel->title;
    }

    public function getReleased()
    {
        return $this->_xml->channel->pubDate;
    }

    public function getLanguage()
    {
        return $this->_xml->channel->language;
    }

    public function getImage()
    {
        return $this->_xml->channel->image->url;
    }

    public function getItem()
    {
        list($key, $item) = each($this->_items);
        if (!$item) return false;
        return [
            'title' => $item->title,
            'desc'  => $item->description,
            'link'  => $item->link,
            'image' => null,
            'tags'  => $item->category,
            'released'  => $item->pubDate,
            ];
    }


}