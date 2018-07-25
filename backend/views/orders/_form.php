<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use yii\helpers\ArrayHelper;    

/* @var $this yii\web\View */
/* @var $model common\models\Orders */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="orders-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->textInput(['readonly' => true, 'value' => Yii::$app->user->identity->first_name.' '.Yii::$app->user->identity->last_name]) ?>    

    <?= $form->field($model, 'date')->widget(
        DatePicker::className(), [
            // inline too, not bad
            'inline' => false, 
            // modify template for custom rendering
            //'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'dd-M-yyyy'
            ]
    ]);?>

    <?= 
        $form->field($model, 'customer_id')->dropDownList(
        ArrayHelper::map(\common\models\Customers::find()->all(), 'id', 'name'),  
        ['prompt'=>'Select Customer']); 
    ?>

    <?= 
        $form->field($model, 'cid')->dropDownList(
        ArrayHelper::map(\common\models\CustomerIds::find()->all(), 'id', 'CID'),  
        ['prompt'=>'Select ID']); 
    ?>

    <?= $form->field($model, 'billing_address')->textarea() ?>        

    <?= $form->field($model, 'gst_details')->textInput() ?>        

    <?= $form->field($model, 'city')->textInput() ?>        

    <?= $form->field($model, 'project_manager_id')->dropDownList(
        ArrayHelper::map(\common\models\User::find()->where(['user_level'=>4])->asArray()->all(), 'id', 'username'),  
	['prompt'=>'Select Project Manager']); ?>


    <?= $form->field($model, 'site_location')->textInput() ?>        

    <?= 
        $form->field($model, 'site_id')->dropDownList(
        ArrayHelper::map(\common\models\Sites::find()->all(), 'id', 'name'),  
        ['prompt'=>'Select Site']); 
    ?>

    <?= 
        $form->field($model, 'section_id')->dropDownList(
        ArrayHelper::map(\common\models\Sections::find()->all(), 'id', 'section_name'),  
        ['prompt'=>'Select Section']); 
    ?>

    <?= $form->field($model, 'qty')->textInput() ?>

    <?= $form->field($model, 'unit')->textInput() ?>

    <?= $form->field($model, 'isPumping')->dropDownList(['1' => 'Yes', '0' => 'No'],['prompt'=>'Select Option']); ?>

    <?= $form->field($model, 'isDumping')->dropDownList(['1' => 'Yes', '0' => 'No'],['prompt'=>'Select Option']); ?>

    <?= $form->field($model, 'vehicle_interval')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tentetive_time')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'confirmed_time')->textInput(['maxlength' => true]) ?>

    <?= 
        $form->field($model, 'plant_id')->dropDownList(
        ArrayHelper::map(\common\models\Plants::find()->all(), 'id', 'plant_name'),  
        ['prompt'=>'Select Plant Name']); 
    ?>

    <?= $form->field($model, 'additional_if_any')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'reason')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'isSIApproved')->dropDownList(['1' => 'Yes', '0' => 'No'],['prompt'=>'Select Option']); ?>

    <?= $form->field($model, 'isPMApproved')->dropDownList(['1' => 'Yes', '0' => 'No'],['prompt'=>'Select Option']); ?>

    <?= $form->field($model, 'isAdminApproved')->dropDownList(['1' => 'Yes', '0' => 'No'],['prompt'=>'Select Option']); ?>

    <?= $form->field($model, 'mix_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mix_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vehicle_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name_of_driver')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name_of_helper')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'plant_dispatch_time')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'slump_at_plant_mm')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'site_reach_time')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'slump_at_site_reach_time')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'any_admixture_addedatsite')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'any_water_added_at_site')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'after_addition_of_water')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'admixture_slumpmm')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pour_start_time')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pour_completed_time')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'plant_return_time')->textInput(['maxlength' => true]) ?>

    <?php // $form->field($model, 'isdeleted')->textInput() ?>

    <?php // $form->field($model, 'created_by')->textInput(['maxlength' => true]) ?>

    <?php // $form->field($model, 'created_at')->textInput() ?>

    <?php // $form->field($model, 'updated_at')->textInput() ?>

    <?php // $form->field($model, 'updated_by')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
