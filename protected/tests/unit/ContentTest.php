<?php
/**
 * Created by JetBrains PhpStorm.
 * User: chipx
 * Date: 15.03.13
 * Time: 17:54
 * To change this template use File | Settings | File Templates.
 */

class ContentTest extends CDbTestCase
{
    public $fixtures = [
        'content'   => 'Content',
        'comments'  => 'Comments'
    ];

    public function testCreate()
    {

        $this->assertTrue(true);
    }
}
