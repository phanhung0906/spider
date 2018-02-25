<?php

namespace common\models;

use Yii;

class Category extends \yii\mongodb\ActiveRecord
{
    const ROOT_CATEGORY_SIGNAL = '#';

    public static function collectionName()
    {
        return ['spider', 'category'];
    }

    public function attributes()
    {
        return [
            '_id',
            'name',
            'slug',
            'parent',
            'created_at',
            'updated_at'
        ];
    }


    public function rules()
    {
        return [
            [['name'], 'required'],
        ];
    }


    public function attributeLabels()
    {
        return [
            '_id'    => Yii::t('app', 'ID'),
            'name'   => Yii::t('app', 'Name'),
            'slug'   => Yii::t('app', 'Slug'),
            'parent' => Yii::t('app', 'Parent'),
        ];
    }

    public function beforeSave($insert)
    {
        if (!parent::beforeSave($insert)) {
            return false;
        }

        if (!$this->parent)
            $this->parent = self::ROOT_CATEGORY_SIGNAL;

        if ($this->isNewRecord) {
            $this->created_at = $this->updated_at = time();
        } else {
            $this->updated_at = time();
        }

        $this->slug = \Yii::$app->helper->convert_to_slug($this->name);
        return true;
    }
}
