<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\OrdersSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="orders-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'date') ?>

    <?= $form->field($model, 'customer_id') ?>

    <?= $form->field($model, 'cid') ?>

    <?php // echo $form->field($model, 'project_manager_id') ?>

    <?php // echo $form->field($model, 'site_id') ?>

    <?php // echo $form->field($model, 'section_id') ?>

    <?php // echo $form->field($model, 'isPumping') ?>

    <?php // echo $form->field($model, 'isDumping') ?>

    <?php // echo $form->field($model, 'vehicle_interval') ?>

    <?php // echo $form->field($model, 'tentetive_time') ?>

    <?php // echo $form->field($model, 'confirmed_time') ?>

    <?php // echo $form->field($model, 'plant_id') ?>

    <?php // echo $form->field($model, 'additional_if_any') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'reason') ?>

    <?php // echo $form->field($model, 'isSIApproved') ?>

    <?php // echo $form->field($model, 'isPMApproved') ?>

    <?php // echo $form->field($model, 'isAdminApproved') ?>

    <?php // echo $form->field($model, 'mix_type') ?>

    <?php // echo $form->field($model, 'mix_no') ?>

    <?php // echo $form->field($model, 'vehicle_no') ?>

    <?php // echo $form->field($model, 'name_of_driver') ?>

    <?php // echo $form->field($model, 'name_of_helper') ?>

    <?php // echo $form->field($model, 'plant_dispatch_time') ?>

    <?php // echo $form->field($model, 'slump_at_plant_mm') ?>

    <?php // echo $form->field($model, 'site_reach_time') ?>

    <?php // echo $form->field($model, 'slump_at_site_reach_time') ?>

    <?php // echo $form->field($model, 'any_admixture_addedatsite') ?>

    <?php // echo $form->field($model, 'any_water_added_at_site') ?>

    <?php // echo $form->field($model, 'after_addition_of_water') ?>

    <?php // echo $form->field($model, 'admixture_slumpmm') ?>

    <?php // echo $form->field($model, 'pour_start_time') ?>

    <?php // echo $form->field($model, 'pour_completed_time') ?>

    <?php // echo $form->field($model, 'plant_return_time') ?>

    <?php // echo $form->field($model, 'isdeleted') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
