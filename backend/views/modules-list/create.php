<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ModulesList */

$this->title = 'Create Modules List';
$this->params['breadcrumbs'][] = ['label' => 'Modules Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="modules-list-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
