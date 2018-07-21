<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\UserList */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-list-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?php 
        $parent=ArrayHelper::map(\common\models\RoleTypes::find()->where(['is_active'=>1])->andWhere(['!=','role_id',1])->asArray()->all(), 'role_id', 'role_name');
        echo  $form->field($model,'user_level')->dropDownList($parent,['prompt'=>'Select user level']) 
    ?>
    
    <?php // $form->field($model, 'password')->passwordInput() ?>

    <?php // $form->field($model, 'auth_key')->textInput(['maxlength' => true]) ?>

    <?php // $form->field($model, 'password_reset_token')->textInput(['maxlength' => true]) ?>

    <?php // $form->field($model, 'user_image')->textInput(['maxlength' => true]) ?>

    <?php //$form->field($model, 'status')->dropDownList(['1' => 'Active', '0' => 'Deactive'],['prompt'=>'Select Option']); ?>    

    <?php // $form->field($model, 'created_at')->textInput() ?>

    <?php // $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
