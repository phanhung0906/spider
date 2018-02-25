<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\LinkCrawler */

$this->title = Yii::t('app', 'Create Promotion');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Link Crawlers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="link-crawler-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
