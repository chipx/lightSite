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
        $result = [];
        if ($parser = $this->preparePrser($feed->type_parse)) {
            $result = $parser->parse($feed->url);
        }
        return $result;
    }

    protected function preparePrser($name)
    {
        $className = __CLASS__ . ucfirst($name);

        if (!isset($this->_parserTypes[$className]) && file_exists(dirname(__FILE__) . DIRECTORY_SEPARATOR . $className . '.php')) {
            $this->_parserTypes[$className] = new $className;
        }

        if (!isset($this->_parserTypes[$className])) {
            Yii::log("Парсер {$className} не найден", CLogger::LEVEL_ERROR);
            return null;
        }
        return  $this->_parserTypes[$className];
    }
}