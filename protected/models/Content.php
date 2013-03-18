<?php

/**
 * This is the model class for table "content".
 *
 * The followings are the available columns in table 'content':
 * @property integer $ID
 * @property string $lang
 * @property integer $author
 * @property string $state
 * @property string $visible
 * @property string $config
 * @property string $title
 * @property string $text
 * @property integer $parent
 * @property string $url
 * @property string $create
 * @property string $update
 */
class Content extends CActiveRecord implements Linked
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Content the static model class
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
		return 'content';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, text, author, lang', 'required'),
			array('author, parent', 'numerical', 'integerOnly'=>true),
			array('lang', 'length', 'max'=>2),
			array('state', 'in', 'range'=>array('create', 'update', 'moderate')),
			array('lang', 'in', 'range'=>array('ru','en')),
			array('visible', 'length', 'max'=>3),
			array('config, title, url', 'length', 'max'=>255),
            array('url', 'translitUrl'),
			array('update', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID, lang, author, state, visible, config, title, text, parent, url, create, update', 'safe', 'on'=>'search'),
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
			'title' => 'Title',
			'text' => 'Text',
			'parent' => 'Parent',
			'url' => 'Url',
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('text',$this->text,true);
		$criteria->compare('parent',$this->parent);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('create',$this->create,true);
		$criteria->compare('update',$this->update,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    protected function beforeSave()
    {
        if (empty($this->url)) {
            $this->url = $this->translitUrl($this->title);
        }
        if ($this->getIsNewRecord()) {
            $this->create = date('Y-m-d H:i:s');
            $this->state = 'create';
        } else {
            $this->state = 'update';
        }
        return parent::beforeSave();
    }

    public function translitUrl($str){
        $tr = array(
            "А"=>"a","Б"=>"b","В"=>"v","Г"=>"g",
            "Д"=>"d","Е"=>"e","Ж"=>"j","З"=>"z","И"=>"i",
            "Й"=>"y","К"=>"k","Л"=>"l","М"=>"m","Н"=>"n",
            "О"=>"o","П"=>"p","Р"=>"r","С"=>"s","Т"=>"t",
            "У"=>"u","Ф"=>"f","Х"=>"h","Ц"=>"ts","Ч"=>"ch",
            "Ш"=>"sh","Щ"=>"sch","Ъ"=>"","Ы"=>"yi","Ь"=>"",
            "Э"=>"e","Ю"=>"yu","Я"=>"ya","а"=>"a","б"=>"b",
            "в"=>"v","г"=>"g","д"=>"d","е"=>"e","ж"=>"j",
            "з"=>"z","и"=>"i","й"=>"y","к"=>"k","л"=>"l",
            "м"=>"m","н"=>"n","о"=>"o","п"=>"p","р"=>"r",
            "с"=>"s","т"=>"t","у"=>"u","ф"=>"f","х"=>"h",
            "ц"=>"ts","ч"=>"ch","ш"=>"sh","щ"=>"sch","ъ"=>"y",
            "ы"=>"yi","ь"=>"","э"=>"e","ю"=>"yu","я"=>"ya",
            " "=> "_", "."=> "", "/"=> "_"
        );

        if (preg_match('/[^A-Za-z0-9_\-]/', $str)) {
            $str = strtr($str,$tr);
            $str = preg_replace('/[^A-Za-z0-9_\-]/', '', $str);
        }

        return $str;
    }

    public function behaviors()
    {
        return [
            'comments' => 'CommentsLinked'
        ];
    }

    public function getLinkType()
    {
        return $this->tableName();
    }
}