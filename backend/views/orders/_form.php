<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use yii\helpers\ArrayHelper;    
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\Orders */
/* @var $ConcreteTransaction common\models\ConcreteTransaction */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="orders-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'user_id')->textInput(['readonly' => true, 'value' => Yii::$app->user->identity->first_name.' '.Yii::$app->user->identity->last_name]) ?>        
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'date')->widget(
                DatePicker::className(), [
                    'inline' => false, 
                    'clientOptions' => [
                        'autoclose' => true,
                        'format' => 'yyyy-mm-dd'
                    ]
                ]);
            ?>        
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?php
                $dataCategory=ArrayHelper::map(\common\models\Customers::find()->asArray()->all(), 'id', 'name');    
                echo $form->field($model, 'customer_id')->dropDownList($dataCategory,
                    [   'prompt'=>'-Select Customer-',
                    'onchange'=>'$.get( "'.Url::toRoute('orders/lists').'", { id: $(this).val() } )
                                .done(function( data )
                                {
                                    $( "select#CID" ).html( data );
                                });
                ']); 
            ?>
        </div>
        <div class="col-md-6">
            <?php    	
                $dataPost=ArrayHelper::map(\common\models\CustomerIds::find()->asArray()->all(), 'id', 'CID');
                echo $form->field($model, 'cid')
                    ->dropDownList( $dataPost,           
                        ['prompt'=>'-Select CID-',
                        'id'=>'CID'
                        ]
                    );
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'billing_address')->textarea() ?>        
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'gst_details')->textInput() ?>       
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'city')->textInput() ?>        
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'project_manager_id')->dropDownList(
                ArrayHelper::map(\common\models\User::find()->where(['user_level'=>3])->asArray()->all(), 'id', 'username'),  
            ['prompt'=>'Select Project Manager']); ?>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-6">
            <?php
                $dataCategory=ArrayHelper::map(\common\models\Sites::find()->asArray()->all(), 'id', 'name');    
                echo $form->field($model, 'site_id')->dropDownList($dataCategory,
                    [   'prompt'=>'-Select Site-',
                    'onchange'=>'$.get( "'.Url::toRoute('orders/sitelocation').'", { id: $(this).val() } )
                                .done(function( data )
                                {
                                    $( "select#Location" ).html( data );
                                });
                ']); 
            ?>
        </div>
        <div class="col-md-6">
            <?php    	
                echo $form->field($model, 'site_location')
                    ->dropDownList( $dataPost,           
                        ['prompt'=>'-Select Site Location-',
                        'id'=>'Location'
                        ]
                    );
            ?>
            
        </div>
        
    </div>

    <div class="row">
        <div class="col-md-6">
            <?= 
                $form->field($model, 'section_id')->dropDownList(
                ArrayHelper::map(\common\models\Sections::find()->all(), 'id', 'section_name'),  
                ['prompt'=>'Select Section']); 
            ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'isPumping')->dropDownList(['1' => 'Yes', '0' => 'No'],['prompt'=>'Select Option']); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'isDumping')->dropDownList(['1' => 'Yes', '0' => 'No'],['prompt'=>'Select Option']); ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'vehicle_interval')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'tentetive_time')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'confirmed_time')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?= 
                $form->field($model, 'plant_id')->dropDownList(
                ArrayHelper::map(\common\models\Plants::find()->all(), 'id', 'plant_name'),  
                ['prompt'=>'Select Plant Name']); 
            ?>
        </div>
        <div class="col-md-6">
            <?php
                $dataCategory=ArrayHelper::map(\common\models\ConcreteMaster::find()->where(['is_parent'=>0])->asArray()->all(), 'id', 'value');    
                echo $form->field($modelConcreteTransaction, 'parent_concrete_id')->dropDownList($dataCategory,
                    [   'prompt'=>'-Select Concrete-',
                        'onchange'=>'$.get( "'.Url::toRoute('orders/listconcrete').'", { id: $(this).val() } )
                                    .done(function( data )
                                    {
                                        $( "select#value" ).html( data );
                                        document.getElementById("div1").style.display="block"; 
                                    });
                    ']); 
            ?>
        </div>
    </div>
    <div id="div1" style="display:none"> 
        <div class="row">
            <div class="col-md-6">
                    <?php          
                        $dataPost=ArrayHelper::map(\common\models\ConcreteMaster::find()->where(['is_parent'=>!0])->asArray()->all(), 'id', 'value');
                        echo $form->field($modelConcreteTransaction, 'sub_concrete_id')
                            ->dropDownList( $dataPost,           
                                ['prompt'=>'-Select Sub Concrete-',
                                    'id'=>'value'
                                ]
                            ); 
                    ?>        
            </div>
            <div class="col-md-6">
                <?= $form->field($modelConcreteTransaction, 'quantity')->textInput() ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($modelEquipmentTransaction, 'equipment_id')->dropDownList(
                ArrayHelper::map(\common\models\EquipmentMaster::find()->all(), 'id', 'name'),  
                ['prompt'=>'Select Equipments']); 
            ?>            
        </div>
        <div class="col-md-6">
            <?= $form->field($modelEquipmentTransaction, 'quantity')->textInput() ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($modelConcreteTransaction, 'unit')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'additional_if_any')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <?php if(Yii::$app->user->identity->user_level==5) { ?>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'status')->dropDownList(['1' => 'Yes', '0' => 'No'],['prompt'=>'Select Staus']); ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'reason')->textarea(['rows' => 2]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'isSIApproved')->dropDownList(['1' => 'Yes', '0' => 'No'],['prompt'=>'Select Option']); ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'isPMApproved')->dropDownList(['1' => 'Yes', '0' => 'No'],['prompt'=>'Select Option']); ?>                        
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
           <?= $form->field($model, 'isAdminApproved')->dropDownList(['1' => 'Yes', '0' => 'No'],['prompt'=>'Select Option']); ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'mix_type')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'mix_no')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'vehicle_no')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'name_of_driver')->textInput(['maxlength' => true]) ?>            
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'name_of_helper')->textInput(['maxlength' => true]) ?>            
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'plant_dispatch_time')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'slump_at_plant_mm')->textInput(['maxlength' => true]) ?>                         
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'site_reach_time')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'slump_at_site_reach_time')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'any_admixture_addedatsite')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'any_water_added_at_site')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'after_addition_of_water')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'admixture_slumpmm')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'pour_start_time')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'pour_completed_time')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'plant_return_time')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <?php } ?>    
    <?php // $form->field($model, 'isdeleted')->textInput() ?>

    <?php // $form->field($model, 'created_by')->textInput(['maxlength' => true]) ?>

    <?php // $form->field($model, 'created_at')->textInput() ?>

    <?php // $form->field($model, 'updated_at')->textInput() ?>

    <?php // $form->field($model, 'updated_by')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?php 
            if(Yii::$app->user->identity->user_level==6) 
            { ?>
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            <?php }
            else { ?>
                <?= Html::submitButton('Approve Order', ['class' => 'btn btn-success']) ?>  
            <?php }
            ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php
// $this->registerJs(
//     "$('#concretetransaction-parent_concrete_id').on('change', function (){
//         $('#div1').show();    
//     });"
// );
?>