<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
?>
<div class="content">
  <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
		<h3 class="form-title">Login to your account</h3>
		<div class="form-group">
      <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
		</div>
		<div class="form-group">
      <?= $form->field($model, 'password')->passwordInput() ?>
		</div>
    <?= $form->field($model, 'rememberMe')->checkbox() ?>
    <div style="margin-top:40px;">
        <?= Html::submitButton('Login <i class="m-icon-swapright m-icon-white"></i>', ['class' => 'btn btn-block green-haze', 'name' => 'login-button']) ?>
    </div>
    <div class="forget-password">
      <p>
				 Don't have an account yet ?&nbsp; <a href="<?= Yii::$app->urlManagerFrontend->createUrl('site/signup') ?>" id="register-btn">
				Create an account </a>
			</p>
    </div>
    <?php ActiveForm::end(); ?>
</div>
