<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\SectionEngineers */

$this->title = 'Create Section Engineers';
$this->params['breadcrumbs'][] = ['label' => 'Section Engineers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="section-engineers-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
