<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\modules\cpanel\models\CategoryCompany $model */

$this->title = 'Create Category Company';
$this->params['breadcrumbs'][] = ['label' => 'Category Companies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-company-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
