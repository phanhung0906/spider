<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use Carbon\Carbon;
use backend\models\LinkCrawler;

/* @var $this yii\web\View */
/* @var $model backend\models\LinkCrawler */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Link Crawlers'), 'url' => ['index']];
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
            'name',
            'max_page',
            'wait_second',
            'category_id',
            'website_name',
            [
                'label' => 'Status',
                'value' => $model->status == LinkCrawler::STATUS_ENABLE ? '<span class="label label-success">Enable</span>' : '<span class="label label-danger">Disable</span>',
                'format' => 'raw',
            ],
            'expired_day',
            'list_url',
            'list_pattern_url',
            [
                'label' => 'Re Crawler',
                'value' => $model->re_crawler == LinkCrawler::RE_CRAWLER_ENABLE ? '<span class="label label-success">Enable</span>' : '<span class="label label-danger">Disable</span>',
                'format' => 'raw',
            ],
            [
                'label' => 'Created At',
                'value' => Carbon::createFromTimestampUTC($model->created_at)->toDateTimeString(),
            ],
            [
                'label' => 'Updated At',
                'value' => Carbon::createFromTimestampUTC($model->updated_at)->toDateTimeString(),
            ],
            [
                'label' => 'Last Run',
                'value' => Carbon::createFromTimestampUTC($model->last_run)->toDateTimeString(),
            ],
        ],
    ]) ?>

</div>
