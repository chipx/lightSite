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

    public function run($cmd)
    {
        $commandName = 'cmd'.ucfirst($cmd);
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
        $class = $this->linkClass;
        $comments = array();
        if ($id = Yii::app()->request->getQuery('id', 0)) {
            if ($model = $class::model()->findByPk($id)) {
                $comments = $model->getComments();
            }
        }

        $this->controller->renderPartial($this->viewDir . DIRECTORY_SEPARATOR . 'list', ['comments' => $comments]);
    }

    public function cmdForm(){
        $this->controller->widget('CommentsForm', array('model' => $this->model));
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
