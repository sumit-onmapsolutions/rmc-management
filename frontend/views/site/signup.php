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
<style>
body, html {
    height: 100%;
    
    margin: 0;
}

.signup{
    /* background-color: transparent; */
    background: rgba(0, 0, 0, 0.5);

}

.bg {
    /* The image used */
    background-image: url("images/JKI_4429.jpg");

    /* Full height */
    height: 215%; 
    width: 100%;
    /* Center and scale the image nicely */
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}
</style>
<!--inner block start here-->

<body class="bg">
<img src = "images/ISO with LOGO.jpg" style="text-align: left" height="150px;" width="150px;"/>
<img src = "images/eagle1.jpeg" style="text-align: right" height="150px;" width="150px;"/>
<center><h1 style="font-size:60px;"><strong><font face="Consolas" color="white">J.Kumar Infraprojects ltd.</font></strong></h1></center>
<center><h1 style="font-size:40px; text-align: right;"><font face="Forte" color="white">We Dream...So We Achieve...</font></h1></center>


<div class="signup-page">
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
</body>
<!--inner block end here-->
