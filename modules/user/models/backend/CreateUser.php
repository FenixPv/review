<?php

namespace app\modules\user\models\backend;

use app\modules\user\models\User;
use yii\base\Exception;
use yii\base\Model;

/**
 * @property string $password_hash
 * @property integer $id
 */
class CreateUser extends Model
{
    public ?string $username = null;
    public ?string $email = null;
    public ?string $password = null;
    public ?int $status = null;

    public function rules(): array
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'string', 'min' => 2, 'max' => 255],
            ['username', 'unique', 'targetClass' => User::class, 'message' => 'This username has already been taken.'],
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => User::class, 'message' => 'This email address has already been taken.'],
            ['email', 'string', 'max' => 255],
            ['password', 'trim'],
            ['password', 'required'],
            ['password', 'string', 'min' => 6],
            ['status', 'integer'],
        ];
    }

    /**
     * Signs user up.
     *
     * @return bool|null whether the creating new account was successful and email was sent
     * @throws Exception
     * @throws \yii\db\Exception
     */
    public function create(): ?bool
    {
        if (!$this->validate()) {
            return null;
        }

        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();

        return $user->save();
    }
}