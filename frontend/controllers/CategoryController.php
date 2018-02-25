<?php

namespace frontend\controllers;

use yii\web\Controller;
use common\models\Product;

class CategoryController extends Controller
{
    public function actionIndex($id)
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
                $sort = 'updated_at DESC';
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
            ->select(['name', 'slug', 'thumbnail', 'aff_url', 'website_name', 'price', 'sale', '_id'])
            ->where(['category_id' => $id])
            ->andWhere(['>=', 'end_date', time()])
            ->andWhere(['status' => Product::STATUS_ENABLE])
            ->orderBy($sort);

        if(!empty($price_condition)){
            $model->andWhere($price_condition);
        }

        $website_filter = $request->get(Product::WEBSITE);
        if (!empty($website_filter)) {
            $website_filter_list = explode(",", $website_filter);
            $model->andWhere(['website_name' => $website_filter_list]);
        }

        $review = $request->get(Product::REVIEW);
        if (!empty($review)) {
            switch ($review){
                case Product::REVIEW_1_STAR:
                    $model->andWhere(['>=', 'review', Product::REVIEW_1_STAR]);
                    break;
                case Product::REVIEW_2_STAR:
                    $model->andWhere(['>=', 'review', Product::REVIEW_2_STAR]);
                    break;
                case Product::REVIEW_3_STAR:
                    $model->andWhere(['>=', 'review', Product::REVIEW_3_STAR]);
                    break;
                case Product::REVIEW_4_STAR:
                    $model->andWhere(['>=', 'review', Product::REVIEW_4_STAR]);
                    break;
                case Product::REVIEW_5_STAR:
                    $model->andWhere(['>=', 'review', Product::REVIEW_5_STAR]);
                    break;
                default:
                    break;
            }
        }

        $countQuery = clone $model;
        $pages = new \yii\data\Pagination([
                'totalCount' => $countQuery->count(),
                'pageSize' => 60
            ]);

        $models = $model->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        //Get website_name
        $collection = \Yii::$app->mongodb->getCollection('product');
        $websites = $collection->aggregate([
                [
                    '$match' => [
                        'category_id' => $id,
                        'status' => Product::STATUS_ENABLE,
                        'end_date'     => [
                            '$gte' => time(),
                        ]
                    ],
                ],
                [
                    '$group' => [
                        '_id' => ['website_name' => '$website_name'],
                        'count' => [ '$sum' => 1]
                    ],
                ]
            ]
        );

        return $this->render('index', [
            'models' => $models,
            'pages' => $pages,
            'websites' => $websites,
        ]);
    }
}