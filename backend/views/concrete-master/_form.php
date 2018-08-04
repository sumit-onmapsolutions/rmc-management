<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\ConcreteMaster */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="concrete-master-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php // $form->field($model, 'type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_parent')->dropDownList(
        ['0' => 'Main Concrete'] + ArrayHelper::map(\common\models\ConcreteMaster::find()->where(['is_parent'=>0])->asArray()->all(), 'id', 'value'), 
        ['prompt'=>'---Select Concrete----']); 
    ?>
    
    <?= $form->field($model, 'value')->textInput(['maxlength' => true]) ?>

    <?php // $form->field($model, 'is_deleted')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
