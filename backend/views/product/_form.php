<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Product;
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'slug') ?>

    <?php /*$form->field($model, 'image')*/ ?>

    <?= $form->field($model, 'price[newPrice]')->input('number')->label('New Price')  ?>

    <?= $form->field($model, 'price[oldPrice]')->input('number')->label('Old Price')  ?>

    <?= $form->field($model, 'status')->dropDownList([
        Product::STATUS_ENABLE => Yii::t('app', 'Enable'),
        Product::STATUS_DISABLE => Yii::t('app', 'Disable')
    ]) ?>

    <?= $form->field($model, 'summary')->textarea(['rows' => '6']) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => '10']) ?>

    <?= $form->field($model, 'aff_url') ?>

    <?= $form->field($model, 'category_id') ?>

    <?= $form->field($model, 'original_url') ?>

    <?= $form->field($model, 'begin_date')->widget(\yii\jui\DatePicker::className(), [
        'options' => ['class' => 'form-control'],
        'dateFormat' => 'dd-MM-yyyy',
    ]) ?>

    <?= $form->field($model, 'end_date')->widget(\yii\jui\DatePicker::className(), [
        'options' => ['class' => 'form-control'],
        'dateFormat' => 'dd-MM-yyyy',
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'reset btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>