<?php
Yii::import('application.components.comments.widgets.*');

class CommentsLinkedAction extends CAction
{
    public $linkClass;
    public $viewDir = 'comments';
    public function __construct($controller, $id)
    {
        parent::__construct($controller, $id);
    }

    public function run($_c)
    {
        $commandName = 'cmd'.ucfirst($_c);
        if (empty($this->linkClass)) {
            Yii::log('Класс модели не определен', CLogger::LEVEL_ERROR);
            return;
        }
        if (method_exists($this, $commandName)) {
            $this->{$commandName}();
        } else {
            throw new CHttpException(502);
        }
    }

    public function cmdList()
    {
        $comments = array();
        $id = Yii::app()->request->getQuery('id', 0);
        $comments = $this->getLinkModel($id)->getComments();

        $this->controller->renderPartial($this->viewDir . DIRECTORY_SEPARATOR . 'list', ['comments' => $comments]);
    }

    public function cmdAdd()
    {
        $id = Yii::app()->request->getQuery('id', 0);

        $comment = new Comments();
        $linkData = $this->getLinkModel($id)->getLinkData();
        $comment['linkID'] = $linkData['linkID'];
        $comment['linkType'] = $linkData['linkType'];

        $this->controller->widget('CommentsForm', array('model' => $comment));
    }

    protected function getLinkModel($id)
    {
        $class = $this->linkClass;
        $model = $class::model()->findByPk($id);

        if (!$model) throw new CHttpException(404, 'Not found');

        return $model;
    }

    protected function getModel($id = null)
    {
        if ($id) {
            return Comments::model()->findByPk($id);
        } else {
            return new Comments();
        }
    }
}
