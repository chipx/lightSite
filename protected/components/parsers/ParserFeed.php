<?php
/**
 * Created by JetBrains PhpStorm.
 * User: chipx
 * Date: 20.03.13
 * Time: 8:44
 * To change this template use File | Settings | File Templates.
 */

class ParserFeed extends CComponent {
    protected $_parserTypes = [];


    public function parse(Feeds $feed)
    {
        $result = null;
        if ($parser = $this->preparePrser($feed)) {
            if ($parser->isNew($feed->last_time)) {
                $result = $parser;
            }
        }
        return $result;
    }

    protected function preparePrser(Feeds $feed)
    {
        $className = __CLASS__ . ucfirst($feed->type_parse);

        if (!isset($this->_parserTypes[$className]) && file_exists(dirname(__FILE__) . DIRECTORY_SEPARATOR . $className . '.php')) {
            $this->_parserTypes[$className] = $className;
        }

        if (!isset($this->_parserTypes[$className])) {
            Yii::log("Парсер {$className} не найден", CLogger::LEVEL_ERROR);
            return null;
        }
        return  new $className($this->getXML($feed->url));
    }

    protected function getXML($url)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $data = curl_exec($ch);
        curl_close($ch);
        return simplexml_load_string($data);
    }

}