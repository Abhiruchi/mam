<?php

/**
 * This is the model class for table "asset".
 *
 * The followings are the available columns in table 'asset':
 * @property string $file
 * @property integer $assetId
 * @property string $assetName
 * @property string $createDate
 * @property string $description
 * @property string $comment
 * @property integer $status
 * @property integer $publication
 * @property integer $onlineEditable
 * @property integer $size
 * @property string $type
 * @property string $reviewer
 * @property string $reviewerComments
 * @property integer $ownerId
 */
class Asset extends CActiveRecord
{
	
	public $write;
	public $file;
	public $departmentId;
	public $categoryId;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'asset';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	
	
	public $tagsUser;
	public $gview;
public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('file, assetId, assetName, publication, onlineEditable, ownerId', 'required'),
			//array('file,assetId,assetName,ownerId', 'required'),
			array('file', 'required'),
			array('file', 'length', 'max'=>245),
			 array('file', 'file', 'types'=>'jpg, gif, png, zip, docx, doc, odp, odt, pdf, ppt, pptx, mp3, mp4, hd, flv, ogg, MP4, OGG',
			 'maxFiles' => 14,
'maxSize'=>1024 * 1024 * 10, // 10MB
'tooLarge'=>'The file was larger than 10MB. Please upload a smaller file.',
'allowEmpty'=>1),
			array('assetId, status, publication, onlineEditable, size, ownerId', 'numerical', 'integerOnly'=>true),
			array('assetName, reviewer', 'length', 'max'=>45),
			array('type', 'length', 'max'=>10),
			array('createDate, description, comment, reviewerComments', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('file, assetId, assetName, createDate, description, comment, status, publication, onlineEditable, size, type, reviewer, reviewerComments, ownerId', 'safe', 'on'=>'search'),
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
		'users'=>array(self::BELONGS_TO,'Users','ownerId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'file' => 'File',
			'assetId' => 'Asset',
			'assetName' => 'Asset Name',
			'createDate' => 'Create Date',
			'description' => 'Description',
			'comment' => 'Comment',
			'status' => 'Status',
			'publication' => 'Publication',
			'onlineEditable' => 'Online Editable',
			'size' => 'Size',
			'type' => 'Type',
			'reviewer' => 'Reviewer',
			'reviewerComments' => 'Reviewer Comments',
			'ownerId' => 'Owner',
			'categoryId' => 'CategoryId',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('file',$this->file,true);
		$criteria->compare('assetId',$this->assetId);
		$criteria->compare('assetName',$this->assetName,true);
		$criteria->compare('createDate',$this->createDate,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('comment',$this->comment,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('publication',$this->publication);
		$criteria->compare('onlineEditable',$this->onlineEditable);
		$criteria->compare('size',$this->size);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('reviewer',$this->reviewer,true);
		$criteria->compare('reviewerComments',$this->reviewerComments,true);
		$criteria->compare('ownerId',$this->ownerId);
		$criteria->compare('categoryId',$this->categoryId);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Asset the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function beforeSave()
	{
		$this->type = $this->file->getType();
		$this->size = $this->file->getSize();
		$this->status=0;
		return parent::beforeSave();
	}
	
}
