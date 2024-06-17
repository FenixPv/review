<?php

/** @var yii\web\View $this */
/** @var User $user */

use app\modules\user\models\User;

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['user/default/reset-password', 'token' => $user->password_reset_token]);
?>
    Hello <?= $user->username ?>,

    Follow the link below to reset your password:

<?= $resetLink ?>

