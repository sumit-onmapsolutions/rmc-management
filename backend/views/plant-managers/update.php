<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\PlantManagers */

$this->title = 'Update Plant Managers: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Plant Managers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="plant-managers-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
