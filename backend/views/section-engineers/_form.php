<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;    

/* @var $this yii\web\View */
/* @var $model common\models\SectionEngineers */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="section-engineers-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php //$form->field($model, 'section_incharge_id')->textInput(['readonly' => true, 'value' => Yii::$app->user->identity->first_name.' '.Yii::$app->user->identity->last_name])  ?>    

    <?= $form->field($model, 'section_id')->dropDownList(
        ArrayHelper::map(\common\models\Sections::find()->where(['section_incharge_id'=>Yii::$app->user->identity->id])->asArray()->all(), 'id', 'section_name')); 
    ?>

    <?= $form->field($model, 'engineer_id')->dropDownList(
        ArrayHelper::map(\common\models\User::find()->where(['user_level'=>6])->asArray()->all(), 'id', 'username'),  
        ['prompt'=>'Select Engineer']); 
    ?>

    <?php // $form->field($model, 'created_at')->textInput() ?>

    <?php  // $form->field($model, 'created_by')->textInput(['maxlength' => true]) ?>

    <?php // $form->field($model, 'updated_at')->textInput() ?>

    <?php // $form->field($model, 'updated_by')->textInput(['maxlength' => true]) ?>

    <?php // $form->field($model, 'is_deleted')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
