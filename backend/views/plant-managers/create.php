<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\PlantManagers */

$this->title = 'Create Plant Managers';
$this->params['breadcrumbs'][] = ['label' => 'Plant Managers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="plant-managers-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
