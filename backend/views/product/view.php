<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use Carbon\Carbon;
use common\models\Product;
$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => (string)$model->_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => (string)$model->_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
            'slug',
            [
                'label' => 'New Price',
                'value' => \Yii::$app->helper->product_price($model->price['newPrice']),
            ],
            [
                'label' => 'Old Price',
                'value' => \Yii::$app->helper->product_price($model->price['oldPrice']),
            ],
            [
                'label' => 'Status',
                'value' => $model->status == Product::STATUS_ENABLE ? '<span class="label label-success">Enable</span>' : '<span class="label label-danger">Disable</span>',
                'format' => 'raw',
            ],
            'summary',
            'description',
            [
                'label' => 'Information',
                'format'=>'raw',
                'value' => function($model){
                    $result = '';
                    foreach ($model->information as $info) {
                        $result .= $info['title'] . ': ' . $info['value'] . '<br>';
                    }
                    return $result;
                }
            ],
            'aff_url',
            'original_url',
            'category_id',
            [
                'label' => 'Created At',
                'value' => Carbon::createFromTimestampUTC($model->created_at)->toDateTimeString(),
            ],
            [
                'label' => 'Updated At',
                'value' => Carbon::createFromTimestampUTC($model->updated_at)->toDateTimeString(),
            ],
        ],
    ]) ?>
    <h2>Image</h2>
    <div>
        <?php if(is_array($model->image)):?>
            <?php foreach($model->image as $image): ?>
                <?= Html::img($image['origin']) ?>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>