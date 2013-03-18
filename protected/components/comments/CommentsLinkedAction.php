<?php
Yii::import('application.components.comments.widgets.*');

class CommentsLinkedAction extends CAction
{
    public $linkClass;
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

    public function cmdTest()
    {
        $this->getController()->renderPartial('test');
    }

    public function cmdForm(){
        $this->controller->widget('CommentsForm', array('model' => $this->model));
    }

//    protected function getModel($id = null)
//    {
//        if ($id) {
//            return Comments::model()->findByPk($id);
//        } else {
//            return new Comments();
//        }
//    }
}
