<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\RoleTypes */
/* @var $form yii\widgets\ActiveForm */


?>

<div class="role-types-form">

    <?php $form = ActiveForm::begin(['id'=>'dynamic-form']); ?>

    <?= $form->field($model, 'role_name')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'is_active')->dropDownList(['1' => 'Active', '0' => 'Deactive'],['prompt'=>'Select Option']); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
