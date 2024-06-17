<?php

namespace app\modules\user\models;

use Yii;
use yii\base\Model;

class ResendVerificationEmailForm extends Model
{
    /**
     * @var string|null
     */
    public ?string $email = null;


    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'exist',
             'targetClass' => User::class,
             'filter' => ['status' => User::STATUS_WAIT],
             'message' => 'There is no user with this email address.'
            ],
        ];
    }

    /**
     * Sends confirmation email to user
     *
     * @return bool whether the email was sent
     */
    public function sendEmail(): bool
    {
        $user = User::findOne([
            'email' => $this->email,
            'status' => User::STATUS_WAIT
        ]);

        if ($user === null) {
            return false;
        }

        return Yii::$app
            ->mailer
            ->compose(
                [
                    'html' => '@app/modules/user/mail/emailVerify-html',
                    'text' => '@app/modules/user/mail/emailVerify-text',
                ],
                ['user' => $user],
            )
            ->setFrom([Yii::$app->params['senderEmail'] => Yii::$app->name . ' robot'])
            ->setTo($this->email)
            ->setSubject('Account registration at ' . Yii::$app->name)
            ->send();
    }
}