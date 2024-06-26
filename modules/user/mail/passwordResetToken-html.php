<?php

use app\modules\user\models\User;
use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var User $user */

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['user/default/reset-password', 'token' => $user->password_reset_token]);
?>
<div class="password-reset">
    <p>Hello <?= Html::encode($user->username) ?>,</p>

    <p>Follow the link below to reset your password:</p>

    <p><?= Html::a(Html::encode($resetLink), $resetLink) ?></p>
</div>
