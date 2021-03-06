<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use Carbon\Carbon;
use backend\models\LinkCrawler;

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Promotion'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="link-crawler-view">

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
            'aff_link',
//            'banners',
//            'categories',
            'content',
//            'coupons',
            'domain',
            'id',
            [
                'label' => 'Image',
                'format'=>'raw',
                'value' => function($model){
                    return Html::img($model->image,
                        ['width' => '400px', 'height' => '200px', 'class' => 'img-responsive']);;
                }
            ],
            'link',
            'merchant',
            'name',
            'start_time',
            'end_time',
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
    <h2>Banners</h2>
    <div>
        <?php if(is_array($model->banners)):?>
            <?php foreach($model->banners as $banner): ?>
                <?= Html::img($banner['link']) ?>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>
                                                                            