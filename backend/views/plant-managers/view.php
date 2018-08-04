<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\PlantManagers */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Plant Managers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="plant-managers-view">

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
            'id',
            'plant_id',
            'plant_manager_id',
            'created_at',
            'created_by',
            'updated_at',
            'updated_by',
            'is_deleted',
        ],
    ]) ?>

</div>
