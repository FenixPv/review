<?php

use app\modules\user\models\User;
use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var User $user */

$verifyLink = Yii::$app->urlManager->createAbsoluteUrl(['user/default/verify-email', 'token' => $user->verification_token]);
?>
<div class="verify-email">
    <p>Hello <?= Html::encode($user->username) ?>,</p>

    <p>Follow the link below to verify your email:</p>

    <p><?= Html::a(Html::encode($verifyLink), $verifyLink) ?></p>
</div>