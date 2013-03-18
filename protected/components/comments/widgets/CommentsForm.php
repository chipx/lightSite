<?php
/**
 * Created by JetBrains PhpStorm.
 * User: chipx
 * Date: 08.02.13
 * Time: 7:32
 * To change this template use File | Settings | File Templates.
 */
class CommentsForm extends CWidget
{
    public $model;

    public function run()
    {
        $this->render('form');
    }
}
