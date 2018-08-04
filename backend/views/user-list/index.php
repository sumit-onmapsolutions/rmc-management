<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use kartik\editable\Editable;




/* @var $this yii\web\View */
/* @var $searchModel common\models\UserListSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User Lists';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-list-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); 

     $gridColumns = [
            
            'first_name',
            'last_name',
            'phone_number',
            'UserLevel',
        [
             'class' => 'kartik\grid\EditableColumn',			   // columns we want to edit	
             'attribute' => 'status',
             'header'=> 'status',
                'filter' => ["10"=>"Active","0"=>"Deactive"],
                'format'=>'raw',
                'value' => function($model, $key, $index)
                {
                    if($model->status == '10'){
                        return '<p>Active</p>';
                    } else if ($model->status == '0'){
                        return '<p>Deactive</p>';
                    
                    }else{
                        return '<p>Active</p>';
                    }
                },

            'editableOptions' => [
                    'inputType' => Editable::INPUT_DROPDOWN_LIST,
                    'data' => ["10"=>"Active","0"=>"Deactive"],
                    'options' => ['class'=>'form-control', 'prompt'=>'Select status...'],
                    'displayValueConfig'=> [
                        '10' => '<i class="glyphicon glyphicon-ok"></i> Active',
                        '0' => '<i class="glyphicon glyphicon-remove"></i>Deactive',
                        
                    ],
                ],
        ],
        ['class' => 'yii\grid\ActionColumn'],
        
    ]; 
    ?>
    <p>
        <?= Html::a('Create User List', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumns,
    ]); ?>
</div>
