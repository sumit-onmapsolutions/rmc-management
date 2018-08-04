<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\Plants */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="plants-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'plant_name')->textInput(['maxlength' => true]) ?>

    <?= 
        $form->field($plantManagersmodel, 'plant_manager_id')->dropDownList(
        ArrayHelper::map(\common\models\User::find()->where(['user_level'=>5])->asArray()->all(), 'id', 'username'),  
        ['prompt'=>'Select Plant Manager']); 
    ?>

    <?= $form->field($model, 'status')->dropDownList(['1' => 'Active', '0' => 'Deactive']); ?>

    <?php // $form->field($model, 'created_at')->textInput() ?>

    <?php // $form->field($model, 'created_by')->textInput(['maxlength' => true]) ?>

    <?php // $form->field($model, 'updated_at')->textInput() ?>

    <?php // $form->field($model, 'updated_by')->textInput(['maxlength' => true]) ?>

    <?php // $form->field($model, 'is_deleted')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
