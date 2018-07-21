<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ExcelRecords */

$this->title = 'Update Excel Records: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Excel Records', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="excel-records-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
