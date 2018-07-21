<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\CustomerIds */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customer-ids-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'customer_id')->dropDownList(
        ArrayHelper::map(\common\models\Customers::find()->all(), 'id', 'name'),  //   1.id -primary key table user  2.username- is use to display
	['prompt'=>'Select Customer Name']); ?>

    <?= $form->field($model, 'CID')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
