<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\RoleTypesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Role Types';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="role-types-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Role Types', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions' => function($model){
          /*  if($model->is_active == '1')
                {
                    return ['class' => 'success'];
                }
                else    
                {   
                    return ['class'=>'danger'];
                }
          */      
        },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'role_id',
            'role_name',
            [
                'attribute'=>'active',
                'header'=>'Status',
                'filter' => ['1'=>'Active', '0'=>'Deactive'],
                'format'=>'raw',
                'value' => function($model, $key, $index)
                {   
                    if($model->is_active == '1')
                    {
                        return "Active";
                    }
                    else
                    {   
                        return "Deactive";
                    }
                },
            ],
            
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
