<?php

/** @var yii\web\View $this */
/** @var User $user */

use app\modules\user\models\User;

$verifyLink = Yii::$app->urlManager->createAbsoluteUrl(['user/default/verify-email', 'token' => $user->verification_token]);
?>
    Hello <?= $user->username ?>,

    Follow the link below to verify your email:

<?= $verifyLink ?>