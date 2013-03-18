<?php

/**
 * This is the model class for table "comments".
 *
 * The followings are the available columns in table 'comments':
 * @property integer $ID
 * @property string $lang
 * @property integer $author
 * @property string $state
 * @property string $visible
 * @property string $config
 * @property string $text
 * @property integer $parent
 * @property integer $linkID
 * @property string $linkType
 * @property string $create
 * @property string $update
 */
class Comments extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Comments the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'comments';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('state, text, linkID, linkType, create', 'required'),
			array('author, parent, linkID', 'numerical', 'integerOnly'=>true),
			array('lang', 'length', 'max'=>2),
			array('state', 'length', 'max'=>8),
			array('visible', 'length', 'max'=>3),
			array('config', 'length', 'max'=>255),
			array('linkType', 'length', 'max'=>7),
			array('update', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID, lang, author, state, visible, config, text, parent, linkID, linkType, create, update', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID' => 'ID',
			'lang' => 'Lang',
			'author' => 'Author',
			'state' => 'State',
			'visible' => 'Visible',
			'config' => 'Config',
			'text' => 'Text',
			'parent' => 'Parent',
			'linkID' => 'Link',
			'linkType' => 'Link Type',
			'create' => 'Create',
			'update' => 'Update',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('ID',$this->ID);
		$criteria->compare('lang',$this->lang,true);
		$criteria->compare('author',$this->author);
		$criteria->compare('state',$this->state,true);
		$criteria->compare('visible',$this->visible,true);
		$criteria->compare('config',$this->config,true);
		$criteria->compare('text',$this->text,true);
		$criteria->compare('parent',$this->parent);
		$criteria->compare('linkID',$this->linkID);
		$criteria->compare('linkType',$this->linkType,true);
		$criteria->compare('create',$this->create,true);
		$criteria->compare('update',$this->update,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    protected function beforeValidate()
    {
        if ($this->isNewRecord) {
            $this->state = 'create';
            $this->create = date('Y-m-d H:i:s');
        }
        return parent::beforeValidate();
    }


}