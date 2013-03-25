<?php
/**
 * Created by JetBrains PhpStorm.
 * User: chipx
 * Date: 20.03.13
 * Time: 9:15
 * To change this template use File | Settings | File Templates.
 */

abstract class ParserFeed_Main extends CComponent {
    protected $_xml;

    public function __construct($xml)
    {
        $this->_xml = $xml;
    }

    abstract public function isNew($dateTtime);
    /*
     * Дата последнего обновления
     */
    abstract public function getReleased();
    /*
     * Язык
     */
    abstract public function getLanguage();
    /*
     * Заголовок
     */
    abstract public function getTitle();
    /*
     * Описание
     */
    abstract public function getDescription();
    /*
     * Иконка канала
     */
    abstract public function getImage();
    /*
     * Получить элемент
     */
    abstract public function getItem();
}