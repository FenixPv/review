<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\modules\cpanel\models\CategoryCompany $model */

$this->title = 'Update Category Company: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Category Companies', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="category-company-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
