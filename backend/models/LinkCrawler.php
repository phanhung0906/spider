<?php

namespace backend\models;

use Yii;

class LinkCrawler extends \yii\mongodb\ActiveRecord
{
    const STATUS_ENABLE = 1;
    const STATUS_DISABLE = 2;

    const RE_CRAWLER_ENABLE = 1;
    const RE_CRAWLER_DISABLE = 2;

    public static $websiteList = [
        'adayroi' => 'adayroi',
        'lazada' => 'lazada'
    ];

    public static function collectionName()
    {
        return ['spider', 'linkCrawler'];
    }

    public function attributes()
    {
        return [
            '_id',
            'name',
            'max_page',
            'wait_second',
            'category_id',
            'website_name',
            'status',
            'expired_day',
            'list_url',
            'list_pattern_url',
            're_crawler',
            'error',
            'created_at',
            'updated_at',
            'last_run',
        ];
    }

    public function rules()
    {
        return [
            [['name', 'max_page', 'wait_second', 'category_id', 'website_name', 'status', 'expired_day', 'list_url', 'list_pattern_url'], 'required'],
            [['max_page', 'wait_second', 'expired_day', 'status'], 'integer'],
            [['created_at', 'updated_at', 'last_run', 're_crawler', 'error'], 'safe']
        ];
    }

    public function attributeLabels()
    {
        return [
            '_id'                 => Yii::t('app', 'ID'),
            'name'                => Yii::t('app', 'Name'),
            'max_page'            => Yii::t('app', 'Max Page'),
            'wait_second'         => Yii::t('app', 'Wait Second'),
            'category_id'         => Yii::t('app', 'Category ID'),
            'website_name'        => Yii::t('app', 'Website'),
            'status'              => Yii::t('app', 'Status'),
            'expired_day'         => Yii::t('app', 'Expired Day'),
            'list_url'            => Yii::t('app', 'List Url'),
            'list_pattern_url'    => Yii::t('app', 'List Pattern Url'),
            're_crawler'          => Yii::t('app', 'Re Crawler'),
            'created_at'          => Yii::t('app', 'Created At'),
            'updated_at'          => Yii::t('app', 'Updated At'),
            'last_run'            => Yii::t('app', 'Last Run'),
        ];
    }

    public function beforeSave($insert)
    {
        if (!parent::beforeSave($insert)) {
            return false;
        }

        if ($this->isNewRecord) {
            $this->created_at = $this->updated_at = time();
            $this->last_run = 0;
            $this->re_crawler = self::RE_CRAWLER_DISABLE;
        } else {
            $this->updated_at = time();
        }

        $this->status      = (int)$this->status;
        $this->max_page    = (int)$this->max_page;
        $this->wait_second = (int)$this->wait_second;
        $this->expired_day = (int)$this->expired_day;
        $this->re_crawler  = (int)$this->re_crawler;

        return true;
    }
}
