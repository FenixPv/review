<?php

use app\modules\user\models\User;
use yii\behaviors\TimestampBehavior;
use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\modules\user\models\User $model */
/** @var yii\bootstrap5\ActiveForm $form */

$this->title = 'Create User';
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-create">

    <h1><?= Html::encode($this->title) ?></h1>
<?php
$form = ActiveForm::begin();
echo $form->field($model, 'username')->textInput(['maxlength' => true]);
echo $form->field($model,'status')->dropDownList(
                    User::getStatusesArray(),
            );
echo $form->field($model, 'email')->textInput(['maxlength' => true]);
echo $form->field($model, 'password')->passwordInput(['maxlength' => true]);
echo Html::submitButton('Save', ['class' => 'btn btn-success w-100']);

ActiveForm::end();