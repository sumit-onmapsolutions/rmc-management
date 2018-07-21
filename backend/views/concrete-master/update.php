<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ConcreteMaster */

$this->title = 'Update Concrete Master: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Concrete Masters', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="concrete-master-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
