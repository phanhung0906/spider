<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\LinkCrawler;
/* @var $this yii\web\View */
/* @var $model backend\models\LinkCrawler */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="link-crawler-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'max_page') ?>

    <?= $form->field($model, 'wait_second') ?>

    <?= $form->field($model, 'category_id') ?>

    <?= $form->field($model, 'website_name')->dropdownList(LinkCrawler::$websiteList,
            ['prompt' => 'Select Category']
        );
    ?>

    <?= $form->field($model, 'status')->radioList([LinkCrawler::STATUS_ENABLE => 'Enable',LinkCrawler::STATUS_DISABLE => 'Disable']); ?>

    <?= $form->field($model, 'expired_day') ?>

    <?= $form->field($model, 'list_url') ?>

    <?= $form->field($model, 'list_pattern_url') ?>

    <?= $form->field($model, 're_crawler')->radioList([LinkCrawler::RE_CRAWLER_ENABLE => 'Enable',LinkCrawler::RE_CRAWLER_DISABLE => 'Disable']); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'reset btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
