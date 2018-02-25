<?php

namespace common\models;

use yii\base\Model;
use Yii;

class Price extends Model
{
    public $newPrice;
    public $oldPrice;

    public function rules()
    {
        return [
            [['newPrice', 'oldPrice'], 'safe'],
        ];
    }
}
