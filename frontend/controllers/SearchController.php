<?php

namespace frontend\controllers;
use yii\web\Controller;
use common\models\Product;

class SearchController extends Controller
{
    public function actionIndex($q)
    {
        $request = \Yii::$app->request;
        $sort_by = $request->get(Product::SORT);

        switch ($sort_by){
            case Product::FILTER_PRICE_ASC:
                $sort = 'price.newPrice ASC';
                break;
            case Product::FILTER_PRICE_DESC:
                $sort = 'price.newPrice DESC';
                break;
            case Product::FILTER_PROMOTION_DESC:
                $sort = 'sale DESC';
                break;
            default:
                $sort = ['score' => ['$meta' => 'textScore']];
                break;
        }

        $prices_filter = $request->get(Product::PRICES);
        $price_condition = [];
        if (!empty($prices_filter)) {
            $prices = explode("-", $prices_filter);
            $fromPrice = isset($prices[0]) ? (int)$prices[0] * 1000 : 0;
            $toPrice = isset($prices[1]) ? (int)$prices[1] * 1000 : 0;
            if ($fromPrice != 0 && $toPrice != 0) {
                $price_condition = ['between', 'price.newPrice', $fromPrice, $toPrice];
            } elseif ($fromPrice > 0 && $toPrice == 0) {
                $price_condition = ['>=', 'price.newPrice', $fromPrice];
            } elseif ($fromPrice == 0 && $toPrice > 0) {
                $price_condition = ['<=', 'price.newPrice', $toPrice];
            }
        }

        $model = Product::find()
            ->select(['score' => ['$meta' => 'textScore'], 'name', 'slug', 'thumbnail', 'aff_url', 'website_name', 'price', 'sale', '_id'])
            ->where(['$text' => [ '$search' => $q]])
            ->andWhere(['>=', 'end_date', time()])
            ->andWhere(['status' => Product::STATUS_ENABLE])
            ->orderBy($sort)
            ->limit(10000);

        if(!empty($price_condition)){
            $model->andWhere($price_condition);
        }

        $countQuery = clone $model;
        $pages = new \yii\data\Pagination([
            'totalCount' => $countQuery->count(),
            'params' => $_GET,
        ]);

        $models = $model->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        return $this->render('index', [
            'models' => $models,
            'pages' => $pages,
        ]);
    }
}