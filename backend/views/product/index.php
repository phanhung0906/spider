<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use common\models\Product;
use kartik\daterange\DateRangePicker;
use backend\models\LinkCrawler;

$this->title = Yii::t('app', 'Products');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Product'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'header'=>'Thumbnail',
                'format' => 'html',
                'value'=> function($data) {
                    return Html::img($data->thumbnail,
                        ['width' => '50px', 'height' => '50px', 'class' => 'img-responsive']);
                },

            ],
            'name',
//            'slug',
//            'price',
//            'summary',
//            'description',
//            'aff_url',
//            'image',
            'original_url',
            'category_id',
            [
                'attribute' => 'website_name',
                'format'    => 'html',
                'filter'    => LinkCrawler::$websiteList,
            ],
            [
                'attribute'      => 'begin_date',
                'format'         => ['date', 'php:d-m-Y'],
                'filter'         => DateRangePicker::widget([
                    'model'         => $searchModel,
                    'attribute'     => 'begin_date',
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
                'attribute'      => 'end_date',
                'format'         => ['date', 'php:d-m-Y'],
                'filter'         => DateRangePicker::widget([
                    'model'         => $searchModel,
                    'attribute'     => 'end_date',
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
                'header'=>'Status',
                'attribute' => 'status',
                'format' => 'html',
                'contentOptions'=>['style'=>'width: 112px;'],
                'filter'         => [Product::STATUS_ENABLE => Yii::t('app', 'Enable'), Product::STATUS_DISABLE => Yii::t('app', 'Disable')],
                'value'=> function($data) {
                    if( $data->status == Product::STATUS_ENABLE) {
                        return Html::tag('span', Yii::t('app', 'Enable'), ['class' => 'label label-success']);
                    } else {
                        return Html::tag('span', Yii::t('app', 'Disable'), ['class' => 'label label-danger']);
                    }
                },
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'header'=>'Action',
                'headerOptions' => ['width' => '80'],
                'template' => '{view} {update} {delete}',
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?></div>