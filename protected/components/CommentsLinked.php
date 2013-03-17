<?php
/**
 * Created by JetBrains PhpStorm.
 * User: chipx
 * Date: 17.03.13
 * Time: 22:11
 * To change this template use File | Settings | File Templates.
 */

class CommentsLinked extends CActiveRecordBehavior
{
    public function getComments($params = array())
    {
        $linkData = $this->getLinkData();

        $findModel = Comments::model();
        if (!empty($params)) {
            $criteria = $findModel->getDbCriteria();
            $this->prepare($criteria, $params);
            $findModel->setDbCriteria($criteria);
        }
        $comments = $findModel->findAllByAttributes($linkData);

        return $comments;
    }

    public function getTreeComments($params = array())
    {
        $comments = $this->getComments($params);
    }

    private function getLinkData()
    {
        return ['linkID' => $this->owner->ID, 'linkType' => $this->owner->linkType];
    }

    protected function prepare(CDbCriteria &$criteria, array $params)
    {
        $table = $this->owner->getTableSchema();
        foreach ($params as $name => $value) {
            if (isset($table->columns[$name])) {
                $criteria->compare($name, $value);
            }
        }
    }


    public function addComment($comment)
    {
        $link = $this->getLinkData();
        $comment->linkID = $link['linkID'];
        $comment->linkType = $link['linkType'];
        $comment->state = 'create';
        $comment->create = date('Y-m-d H:i:s');
        return $comment->save();
    }
}