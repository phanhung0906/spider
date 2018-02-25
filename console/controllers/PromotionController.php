<?php

namespace console\controllers;

use yii\console\Controller;
use common\models\Promotion;

class PromotionController extends Controller {
    public function actionIndex() {
        $url               = "https://api.accesstrade.vn/v1/offers_informations";
        $request_headers   = [];
        $request_headers[] = 'Authorization: Token xKI_SSIItRfWYmvmKiQSkYucgMdMEdny';
        $request_headers[] = 'Content-Type: application/json';

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $request_headers);
        $response = curl_exec($ch);
        curl_close($ch);

        if ($response) {
            $response = (array)json_decode($response);
            foreach ($response['data'] as $promotion) {
                $promotion = (array) $promotion;
                $endTime = strtotime($promotion['end_time']);

                if ($endTime < time())
                    continue;

                $model = Promotion::find()->where(['id' => $promotion['id']])->one();

                if (!$model)
                    $model = new Promotion();

                $model->name       = $promotion['name'];
                $model->id         = $promotion['id'];
                $model->aff_link   = $promotion['aff_link'];
                $model->categories = $promotion['categories'];
                $model->content    = $promotion['content'];
                $model->coupons    = $promotion['coupons'];
                $model->domain     = $promotion['domain'];
                $model->image      = $promotion['image'];
                $model->banners    = $promotion['banners'];
                $model->link       = $promotion['link'];
                $model->merchant   = $promotion['merchant'];
                $model->end_time   = strtotime($promotion['end_time']);
                $model->start_time = strtotime($promotion['start_time']);

                if ($model->save()) {
                    echo 'Promotion ID: ' . (string)$model->_id ."\n";
                }
            }
        } else {
            echo "Error when call api accesstrade\n";
        }
    }
}