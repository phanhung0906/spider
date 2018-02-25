<?php

namespace api\controllers;

use Yii;
use yii\web\Controller;
use common\models\Product;
use Carbon\Carbon;

class ProductController extends Controller
{

    public function beforeAction($action)
    {
        $this->enableCsrfValidation = false;

        return parent::beforeAction($action);
    }

    public function actionCreate()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $now     = Carbon::now();
        $request = \Yii::$app->request->post();

        $uri_parts    = explode('?', $request['original_url'], 2);
        $original_url = $uri_parts[0];
        $aff_url      = str_replace(Product::REPLACE_URL, urlencode($original_url), $request['data']['list_pattern_url']);

        $sale = 0;
        if ($request['newPrice'] && $request['oldPrice']
            && $request['newPrice'] != $request['oldPrice']
            && $request['newPrice'] < $request['oldPrice']
            && $request['oldPrice'] != 0
        ) {
            $sale = round((1 - $request['newPrice'] / $request['oldPrice']) * 100);
        }

        $model = Product::find()->where(['original_url' => $original_url])->one();
        if(!$model)
            $model = new Product();

        $model->name            = trim($request['name']);
        $model->brand           = trim($request['brand']);
        $model->description     = trim(preg_replace('~>\\s+<~m', '><', $request['description']));
        $model->summary         = trim(preg_replace('~>\\s+<~m', '><', $request['summary']));
        $model->information     = $request['information'];
        $model->image           = $request['image'];
        $model->thumbnail       = $request['thumbnail'];
        $model->original_url    = $original_url;
        $model->aff_url         = $aff_url;
        $model->category_id     = $request['data']['category_id'];
        $model->website_name    = $request['data']['website_name'];
        $model->begin_date      = $now->copy()->getTimestamp();
        $model->end_date        = $now->copy()->addDays((int)$request['data']['expired_day'])->getTimestamp();
        $model->price           = ['newPrice' => $request['newPrice'], 'oldPrice' => $request['oldPrice']];
        $model->sale            = $sale;
        $model->review          = isset($request['review']) ? (float)trim($request['review']) : '';
        $model->review_quantity = isset($request['review_quantity']) ? (float)trim($request['review_quantity']) : '';

        if ($model->save()) {
            return true;
        }

        return false;
    }
}
