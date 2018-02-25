<?php

namespace frontend\helpers;
use yii\helpers\Url;

class Helper extends \common\helpers\Helper
{
    public static function urlDetail($route, $id, $slug, $scheme = false)
    {
        return Url::to([$route, 'id' => $id, 'slug' => $slug], $scheme);
    }
}
