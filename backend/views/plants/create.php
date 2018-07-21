<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Plants */

$this->title = 'Create Plants';
$this->params['breadcrumbs'][] = ['label' => 'Plants', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="plants-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
