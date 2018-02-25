<?php

namespace api\controllers;

use backend\models\LinkCrawler;
use yii\web\Controller;

class LinkCrawlerController extends Controller
{
    public function actionIndex()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $crawler_link = LinkCrawler::find()
            ->select(['category_id', 'expired_day', 'wait_second', 'max_page', 'list_url', 'list_pattern_url', 'website_name'])
            ->where(['status' => LinkCrawler::STATUS_ENABLE])
            ->andWhere(['re_crawler' => LinkCrawler::RE_CRAWLER_ENABLE])
            ->orderBy('updated_at DESC')
            ->asArray()
            ->one();

        if (empty($crawler_link)) {
            $crawler_link = LinkCrawler::find()
                ->select(['category_id', 'expired_day', 'wait_second', 'max_page', 'list_url', 'list_pattern_url', 'website_name'])
                ->where(['status' => LinkCrawler::STATUS_ENABLE])
                ->orderBy('last_run ASC')
                ->asArray()
                ->one();
        }

        $model = LinkCrawler::findOne((string)$crawler_link['_id']);

        $model->last_run   = time();
        $model->re_crawler = LinkCrawler::RE_CRAWLER_DISABLE;
        $model->save();

        return $crawler_link;
    }

    public function actionError()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $request = \Yii::$app->request->post();

        $model = LinkCrawler::findOne((string)$request['data']['_id']);

        if(!$model)
            return false;

        $model->error = $request['data']['error'];
        $model->save();
    }
}
