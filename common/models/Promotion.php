<?php

namespace common\models;

use Yii;

/**
 * This is the model class for collection "promotion".
 *
 * @property \MongoDB\BSON\ObjectID|string $_id
 * @property mixed $aff_link
 * @property mixed $banners
 * @property mixed $categories
 * @property mixed $content
 * @property mixed $coupons
 * @property mixed $domain
 * @property mixed $end_time
 * @property mixed $id
 * @property mixed $image
 * @property mixed $link
 * @property mixed $merchant
 * @property mixed $name
 * @property mixed $start_time
 */
class Promotion extends \yii\mongodb\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function collectionName()
    {
        return ['spider', 'promotion'];
    }

    /**
     * {@inheritdoc}
     */
    public function attributes()
    {
        return [
            '_id',
            'aff_link',
            'banners',
            'categories',
            'content',
            'coupons',
            'domain',
            'id',
            'image',
            'link',
            'merchant',
            'name',
            'start_time',
            'end_time',
            'created_at',
            'updated_at',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['aff_link', 'banners', 'categories', 'content', 'coupons', 'domain', 'end_time', 'id', 'image', 'link', 'merchant', 'name', 'start_time', 'created_at', 'updated_at'], 'safe']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            '_id'        => 'ID',
            'aff_link'   => 'Aff Link',
            'banners'    => 'Banners',
            'categories' => 'Categories',
            'content'    => 'Content',
            'coupons'    => 'Coupons',
            'domain'     => 'Domain',
            'end_time'   => 'End Time',
            'id'         => 'Id',
            'image'      => 'Image',
            'link'       => 'Link',
            'merchant'   => 'Merchant',
            'name'       => 'Name',
            'start_time' => 'Start Time',
        ];
    }

    public function beforeSave($insert)
    {
        if (!parent::beforeSave($insert)) {
            return false;
        }

        if ($this->isNewRecord) {
            $this->created_at = $this->updated_at = time();
        } else {
            $this->updated_at = time();
        }

        return true;
    }
}
