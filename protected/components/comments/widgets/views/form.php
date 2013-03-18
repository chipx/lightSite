<?php
/**
 * @var $this CommentsForm
 * @var $form CActiveForm
  */
?>
<?php $form = $this->beginWidget('CActiveForm');?>
<div class="row">
    <?php echo $form->label($this->model, 'text')?>
    <?php echo $form->textArea($this->model, 'text')?>
    <?php echo $form->error($this->model, 'text')?>
</div>
    <div class="row">
        <?php echo CHtml::ajaxButton(Yii::t('comment', 'Send'),
                                    $this->getController()->createUrl('', array('cmd' => $this->model->isNewRecord ? 'create' : 'uppdate')))?>
    </div>
<?php $this->endWidget();?>