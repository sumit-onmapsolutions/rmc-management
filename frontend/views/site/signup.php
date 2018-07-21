<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>

<!--inner block start here-->
<div class="signup-page-main">
     <div class="signup-main">  	
    	<div class="signup-head">
				<h1>Sign Up</h1>
		</div>
        <div class="signup-block">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
            
            <?= $form->field($model, 'first_name')->textInput(['autofocus' => true,'placeholder' => "First Name"])->label(false) ?>

            <?= $form->field($model, 'last_name')->textInput(['placeholder' => "Last Name"])->label(false) ?>

            <?= $form->field($model, 'employee_id')->textInput(['placeholder' => "Employee ID"])->label(false) ?>

            <?= $form->field($model, 'phone_number')->textInput(['placeholder' => "Phone Number"])->label(false) ?>
            
            <?= $form->field($model, 'username')->textInput(['placeholder' => "User Name"])->label(false) ?>
            
            <?= $form->field($model, 'email')->textInput(['placeholder' => "Email"])->label(false) ?>

            <?php 
                $parent=ArrayHelper::map(\common\models\RoleTypes::find()->where(['is_active'=>1])->asArray()->all(), 'role_id', 'role_name');
                echo  $form->field($model, 'user_level')->dropDownList($parent,['prompt'=>'select User Level'])->label(false) 
            ?>   

            <?= $form->field($model, 'password')->passwordInput(['placeholder' => "Password"])->label(false) ?>
            <div class="form-group">
                <?= Html::submitButton('Signup', ['class' => 'btn btn-primary btn-block', 'name' => 'signup-button']) ?>
            </div>
            
            <?php ActiveForm::end(); ?>
            
        </div>
    </div>
</div>
<!--inner block end here-->
