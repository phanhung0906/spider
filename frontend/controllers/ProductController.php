<?php

namespace frontend\controllers;

use yii\web\Controller;
use common\models\Product;

class ProductController extends Controller
{
    public function actionIndex($id)
    {
        $model = Product::find($id)->select(['name', 'summary', 'information', 'description', 'image', 'slug', 'brand', 'aff_url', 'website_name', 'price', 'sale', '_id', 'updated_at', 'review', 'review_quantity'])
            ->where(['_id' => $id])
            ->andWhere(['>=', 'end_date', time()])
            ->andWhere(['status' => Product::STATUS_ENABLE])
            ->one();

        if ($model !== null) {
            $relateProduct = Product::find()->select(['score' => ['$meta' => 'textScore'],'name', 'thumbnail', 'slug', 'aff_url', 'website_name', 'price', 'sale', '_id'])
                ->where(['$text' => [ '$search' => $model['name']]])
                ->andWhere(['<>', '_id', $id])
                ->andWhere(['>=', 'end_date', time()])
                ->andWhere(['status' => Product::STATUS_ENABLE])
                ->orderBy(['score' => ['$meta' => 'textScore']])
                ->limit(10)
                ->all();

            return $this->render('index', [
                'model'         => $model,
                'relateProduct' => $relateProduct
            ]);
        }
    }
}