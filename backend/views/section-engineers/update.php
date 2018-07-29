<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\SectionEngineers */

$this->title = 'Update Section Engineers: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Section Engineers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="section-engineers-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
