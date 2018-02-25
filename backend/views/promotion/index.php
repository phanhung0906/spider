<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use kartik\daterange\DateRangePicker;
use backend\models\LinkCrawler;

$this->title = Yii::t('app', 'Promotion');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="link-crawler-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Promotion'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'header'=>'Image',
                'format' => 'html',
                'value'=> function($data) {
                    return Html::img($data->image,
                        ['width' => '200px', 'height' => '200px', 'class' => 'img-responsive']);
                },

            ],
            'name',
//            'aff_link',
//            'categories',
//            'content',
//            'coupons',
            'domain',
//            'id',
//            'link',
            'merchant',
            [
                'attribute'      => 'start_time',
                'format'         => ['date', 'php:d-m-Y'],
                'filter'         => DateRangePicker::widget([
                    'model'         => $searchModel,
                    'attribute'     => 'start_time',
                    'convertFormat' => true,
                    'pluginOptions' => [
                        'timePickerIncrement' => 90,
                        'locale'              => [
                            'format' => 'd-m-Y'
                        ]
                    ]
                ]),
                'contentOptions' => ['style' => 'min-width: 200px;']
            ],
            [
                'attribute'      => 'end_time',
                'format'         => ['date', 'php:d-m-Y'],
                'filter'         => DateRangePicker::widget([
                    'model'         => $searchModel,
                    'attribute'     => 'end_time',
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
