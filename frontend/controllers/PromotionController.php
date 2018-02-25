<?php

namespace frontend\controllers;

use yii\web\Controller;
use common\models\Promotion;

class PromotionController extends Controller
{
    public function actionIndex()
    {
        $model = Promotion::find()
            ->select(['name', 'aff_link', 'content', 'coupons', 'image', 'merchant', 'start_time', 'end_time'])
            ->where(['>=', 'end_time', time()])
            ->orderBy('merchant ASC');

        $countQuery = clone $model;
        $pages = new \yii\data\Pagination(['totalCount' => $countQuery->count()]);
        $models = $model->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        return $this->render('index', [
            'models' => $models,
            'pages' => $pages,
        ]);
    }
}