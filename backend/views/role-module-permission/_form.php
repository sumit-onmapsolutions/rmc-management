<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\RoleModulePermission */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="role-module-permission-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php // $form->field($model, 'role_id')->textInput() ?>

    <?php 
        $parent=ArrayHelper::map(\common\models\RoleTypes::find()->where(['is_active'=>1])->asArray()->all(), 'role_id', 'role_name');
        echo  $form->field($model, 'role_id')->dropDownList($parent,['prompt'=>'Select Role']) 
    ?>   

    <?php 
        $parent=ArrayHelper::map(\common\models\ModulesList::find()->where(['is_active'=>1])->asArray()->all(), 'module_id', 'module_name');
        echo  $form->field($model, 'module_id')->dropDownList($parent,['prompt'=>'Select Module']) 
    ?>   

    <?php // $form->field($model, 'module_id')->textInput() ?>

    <?= $form->field($model, 'new')->checkbox() ?>

    <?= $form->field($model, 'view')->checkbox() ?>

    <?= $form->field($model, 'save')->checkbox() ?>

    <?= $form->field($model, 'remove')->checkbox() ?>

    <?php //$form->field($model, 'added_at')->textInput() ?>

    <?php //$form->field($model, 'added_by')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
