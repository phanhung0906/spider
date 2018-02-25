<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use kartik\daterange\DateRangePicker;
use backend\models\LinkCrawler;

$this->title = Yii::t('app', 'Link Crawlers');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="link-crawler-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Link Crawler'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name',
            'max_page',
            'wait_second',
             'category_id',
             'expired_day',
             'list_url',
            [
                'attribute' => 'website_name',
                'format'    => 'html',
                'filter'    => LinkCrawler::$websiteList,
            ],
            [
                'attribute'      => 'last_run',
                'format'         => ['date', 'php:d-m-Y H:i:s'],
                'filter'         => DateRangePicker::widget([
                    'model'         => $searchModel,
                    'attribute'     => 'last_run',
                    'convertFormat' => true,
                    'pluginOptions' => [
                        'timePickerIncrement' => 30,
                        'locale'              => [
                            'format' => 'd-m-Y'
                        ]
                    ]
                ]),
                'contentOptions' => ['style' => 'min-width: 200px;']
            ],
            'error',
            [
                'attribute' => 'status',
                'format' => 'html',
                'contentOptions'=>['style'=>'width: 112px;'],
                'filter'         => [LinkCrawler::STATUS_ENABLE => Yii::t('app', 'Enable'), LinkCrawler::STATUS_DISABLE => Yii::t('app', 'Disable')],
                'value'=> function($data) {
                    if( $data->status == LinkCrawler::STATUS_ENABLE) {
                        return Html::tag('span', Yii::t('app', 'Enable'), ['class' => 'label label-success']);
                    } else {
                        return Html::tag('span', Yii::t('app', 'Disable'), ['class' => 'label label-danger']);
                    }
                },
            ],
            [
             'class' => 'yii\grid\ActionColumn',
             'header'=>'Action',
             'headerOptions' => ['width' => '100'],
             'template' => '{view} {update} {delete} {copy}',
             'buttons' => [
                 'copy' => function($url, $model, $key) {     // render your custom button
                     return Html::a('<span class="glyphicon glyphicon-copy"></span>', ['create', 'id' => (string)$model->_id]);
                }
             ]
            ],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
