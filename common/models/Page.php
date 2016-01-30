<?php

namespace common\models;

use common\components\helpers\UrlHelper;
use Yii;

/**
 * This is the model class for table "page".
 *
 * @property integer $id
 * @property string $url_description
 * @property string $title
 * @property string $content
 * @property integer $status
 * @property integer $created_by
 * @property integer $updated_by
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $deleted_at
 *
 * @property User $updatedBy
 * @property User $createdBy
 */
class Page extends \common\components\db\ActiveRecord
{
	/**  */
	const STATUS_SHOW = 0;
	const STATUS_HIDE = 1;

	/**
	 * @return array
	 */
	public function getStatusOptions()
	{
		return [
			self::STATUS_SHOW => Yii::t('page', 'Show'),
			self::STATUS_HIDE => Yii::t('page', 'Hide'),
		];
	}

	/**
	 * @return string
	 */
	public function getStatusString()
	{
		switch ($this->status) {
			case self::STATUS_SHOW:
				return Yii::t('page', 'Show');
			case self::STATUS_HIDE:
				return Yii::t('page', 'Hide');
		}
	}

	/**
	 * The URL description is the description with non-alphanumeric characters replaced by dashes
	 */
	public function beforeValidate()
	{
		$this->url_description = UrlHelper::urlify($this->title);
		return parent::beforeValidate();
	}

	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'page';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['title', 'content'], 'required'],
			[['content'], 'string'],
			[['status'], 'integer'],
			[['url_description'], 'unique'],
			[['title'], 'string', 'max' => 256]
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return array_merge(parent::attributeLabels(), [
			'id'              => Yii::t('common', 'ID'),
			'url_description' => Yii::t('page', 'URL Description'),
			'title'           => Yii::t('page', 'Title'),
			'content'         => Yii::t('page', 'Content'),
			'status'          => Yii::t('page', 'Status'),
		]);
	}
}
