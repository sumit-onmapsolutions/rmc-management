<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ModulesList */

$this->title = 'Update Modules List: ' . $model->module_id;
$this->params['breadcrumbs'][] = ['label' => 'Modules Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->module_id, 'url' => ['view', 'id' => $model->module_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="modules-list-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
