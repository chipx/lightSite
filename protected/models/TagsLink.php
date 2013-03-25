<?php

/**
 * This is the model class for table "tags_link".
 *
 * The followings are the available columns in table 'tags_link':
 * @property integer $tagID
 * @property integer $linkID
 * @property string $linkType
 */
class TagsLink extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TagsLink the static model class
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
		return 'tags_link';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('linkID, linkType', 'required'),
			array('linkID', 'numerical', 'integerOnly'=>true),
			array('linkType', 'length', 'max'=>7),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('tagID, linkID, linkType', 'safe', 'on'=>'search'),
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
			'tagID' => 'Tag',
			'linkID' => 'Link',
			'linkType' => 'Link Type',
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

		$criteria->compare('tagID',$this->tagID);
		$criteria->compare('linkID',$this->linkID);
		$criteria->compare('linkType',$this->linkType,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}