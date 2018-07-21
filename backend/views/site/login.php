<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;  

$this->title = 'Login';
//$this->params['breadcrumbs'][] = $this->title;
?>


<div class="container">
<div class="login-page">
    <div class="login-main">  	
    	 <div class="login-head">
				<h1>Login</h1>
			</div>
			<div class="login-block">
          <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
          <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label(false) ?>
          <?= $form->field($model, 'password')->passwordInput()->label(false) ?>
          <?= $form->field($model, 'rememberMe')->checkbox() ?>
          <!--
          <div class="forgot-top-grids">
						<div class="forgot-grid">
							<ul>
								<li>
                
									<input type="checkbox" id="brand1" value="">
									<label for="brand1"><span></span>Remember me</label>
								</li>
							</ul>
						</div>
						<div class="forgot">
							<a href="#">Forgot password?</a>
						</div>
						<div class="clearfix"> </div>
					</div>-->
          <?= Html::submitButton('Login', ['class' => 'btn btn-primary btn-block', 'name' => 'login-button']) ?>

					<!--<h3>Not a member?<a href="<a href="<?php// echo Url::toRoute('site/signup'); ?>">">Sign up now</a></h3>				-->
					<?php ActiveForm::end(); ?>
			</div>
      </div>
</div>
</div>
<!--inner block end here-->
<!--copy rights start here-->
<div class="copyrights">
	 <p>© 2016 J Kumar RMC. All Rights Reserved | Design by  <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p>
</div>	
<!--COPY rights end here-->














