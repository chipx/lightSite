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

    public function testSelect()
    {
        $model = Content::model()->findByPk(2);
        $this->assertEquals(2, $model->ID);
        $this->assertEquals('create', $model->state);
    }

    public function testGetComments()
    {
        $model = Content::model()->findByPk(2);
        $this->assertEquals(2, $model->ID);

        $comments = $model->getComments();
        $this->assertCount(3, $comments);

        $comments = $model->getComments(['state' => 'create']);
        $this->assertCount(1, $comments);

        $comments = $model->getComments(['visible' => 'all']);
        $this->assertCount(3, $comments);

    }

    public function testAddComment()
    {
        $model = Content::model()->findByPk(3);
        $this->assertEquals(3, $model->ID);

        $comment = new Comments();
        $comment->author = 2;
        $comment->text = 'Hello world';

        $result = $model->addComment($comment);
        $this->assertTrue($result);
        $this->assertEquals(3, $comment->linkID);
        $this->assertEquals('content', $comment->linkType);
    }


}
