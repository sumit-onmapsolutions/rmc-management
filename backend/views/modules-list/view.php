<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ModulesList */

$this->title = $model->module_id;
$this->params['breadcrumbs'][] = ['label' => 'Modules Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="modules-list-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->module_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->module_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'module_id',
            'module_name',
            'controller',
            'icon',
            //'is_active',
            [
                'attribute'=>'Status',
                'header'=>'Status',
                'filter' => ['1'=>'Active', '0'=>'Deactive'],
                'format'=>'raw',    
                'value' => function($model)
                {   
                    if($model->is_active == '1')
                    {
                        return '<p class="text-success">Active</p>';
                    }
                    else
                    {   
                        return '<p class="text-danger">Deactive</p>';
                    }
                },
            ],
        ],
    ]) ?>

</div>
