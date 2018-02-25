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
    <?= $form->field($model, 'aff_link') ?>
    <?= $form->field($model, 'content') ?>
    <?= $form->field($model, 'domain') ?>
    <?= $form->field($model, 'image') ?>
    <?= $form->field($model, 'link') ?>
    <?= $form->field($model, 'merchant') ?>
    <?= $form->field($model, 'start_time') ?>
    <?= $form->field($model, 'end_time') ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'reset btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
