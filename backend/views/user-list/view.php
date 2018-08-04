<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\UserList */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'User Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-list-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
            //'id',
            'first_name',
            'last_name',
            'phone_number',
            'UserLevel',
            'email:email',
            //'password_hash',
            //'auth_key',
            //'password_reset_token',
            //'user_image',
            'user_level',
            [
                'attribute'=>'status',
                'header'=>'Status',
                'filter' => ['10'=>'Active', '0'=>'Deactive'],
                'format'=>'raw',    
                'value' => function($model)
                {   
                    if($model->status == '10')
                    {
                        return '<p class="text-success">Active</p>';
                    }
                    else
                    {   
                        return '<p class="text-danger">Deactive</p>';
                    }
                },
            ],
            //'created_at',
            //'updated_at',
        ],
    ]) ?>

</div>
