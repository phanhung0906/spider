<?php

namespace common\models;

use Yii;

/**
 * This is the model class for collection "product".
 *
 * @property \MongoDB\BSON\ObjectID|string $_id
 * @property mixed $name
 * @property mixed $slug
 * @property mixed $brand
 * @property mixed $price
 * @property mixed $sale
 * @property mixed $status
 * @property mixed $summary
 * @property mixed $description
 * @property mixed $aff_url
 * @property mixed $image
 * @property mixed $thumbnail
 * @property mixed $information
 * @property mixed $original_url
 * @property mixed $category_id
 * @property mixed $website_name
 * @property mixed $review
 * @property mixed $review_quantity
 * @property mixed $begin_date
 * @property mixed $end_date
 * @property mixed $created_at
 * @property mixed $updated_at
 */
class Product extends \yii\mongodb\ActiveRecord
{
    const STATUS_ENABLE  = 1;
    const STATUS_DISABLE = 2;
    const REPLACE_URL    = '{url}';

    const FILTER_PRICE_ASC      = 1;
    const FILTER_PRICE_DESC     = 2;
    const FILTER_PROMOTION_DESC = 3;

    const PRICES  = 'prices';
    const WEBSITE = 'website';
    const REVIEW  = 'review';
    const SORT    = 'sort';

    const REVIEW_1_STAR = 1;
    const REVIEW_2_STAR = 2;
    const REVIEW_3_STAR = 3;
    const REVIEW_4_STAR = 4;
    const REVIEW_5_STAR = 5;

    public static function collectionName()
    {
        return ['spider', 'product'];
    }

    /**
     * {@inheritdoc}
     */
    public function attributes()
    {
        return [
            '_id',
            'name',
            'slug',
            'brand',
            'price',
            'sale',
            'status',
            'summary',
            'information',
            'description',
            'aff_url',
            'image',
            'thumbnail',
            'original_url',
            'category_id',
            'website_name',
            'review',
            'review_quantity',
            'begin_date',
            'end_date',
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
            [['name'], 'required'],
            [['status'], 'integer'],
            [['name', 'slug', 'price', 'sale', 'brand', 'status', 'summary', 'description', 'aff_url', 'image', 'thumbnail', 'original_url', 'category_id', 'website_name', 'review', 'review_quantity', 'begin_date', 'end_date', 'created_at', 'updated_at'], 'safe'],
//            ['price', 'common\validators\EmbedDocValidator','model'=>'\common\models\Price'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            '_id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'slug' => Yii::t('app', 'Slug'),
            'price' => Yii::t('app', 'Price'),
            'sale' => Yii::t('app', 'Sale'),
            'brand' => Yii::t('app', 'Brand'),
            'status' => Yii::t('app', 'Status'),
            'summary' => Yii::t('app', 'Summary'),
            'description' => Yii::t('app', 'Description'),
            'aff_url' => Yii::t('app', 'Aff Url'),
            'image' => Yii::t('app', 'Image'),
            'thumbnail' => Yii::t('app', 'Thumbnail'),
            'original_url' => Yii::t('app', 'Original Url'),
            'category_id' => Yii::t('app', 'Category ID'),
            'website_name' => Yii::t('app', 'Website Name'),
            'review' => Yii::t('app', 'Review'),
            'review_quantity' => Yii::t('app', 'Review Quantity'),
            'begin_date' => Yii::t('app', 'Begin Date'),
            'end_date' => Yii::t('app', 'End Date'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    public function beforeSave($insert)
    {
        if (!parent::beforeSave($insert)) {
            return false;
        }

        if ($this->isNewRecord) {
            $this->created_at = $this->updated_at = time();

            if(!$this->status)
                $this->status = self::STATUS_ENABLE;
        } else {
            $this->updated_at = time();
        }

        $this->slug   = \Yii::$app->helper->convert_to_slug($this->name);
        $this->status = (int)$this->status;

        if (is_array($this->price)) {
            $prices = [];
            foreach ($this->price as $type => $value) {
                $prices[$type] = (int)$value;
            }
            $this->price = $prices;
        }

        return true;
    }
}
