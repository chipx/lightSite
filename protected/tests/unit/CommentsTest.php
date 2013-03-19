<?php
/**
 * Created by JetBrains PhpStorm.
 * User: chipx
 * Date: 18.03.13
 * Time: 23:00
 * To change this template use File | Settings | File Templates.
 */

class CommentsTest extends CDbTestCase {
    public $fixtures = [
        'content'   => 'Content',
        'comments'  => 'Comments'
    ];

    public function testPrepareCreate()
    {
        $comment = new Comments();

        $comment->create = '2013-03-15 03:45:44';
        $this->assertEquals('03:45 15.03.2013', $comment->prepareCreate);

        $comment->create = date('Y-m-d H:i:s');
        $this->assertEquals(date('H:i'), $comment->prepareCreate);
    }


}
