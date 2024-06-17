<?php

namespace app\modules\user\models;

use yii\base\InvalidArgumentException;
use yii\base\Model;
use yii\db\Exception;

class VerifyEmailForm extends Model
{
    /**
     * @var string|null
     */
    public ?string $token = null;

    /**
     * @var User
     */
    private User $_user;


    /**
     * Creates a form model with given token.
     *
     * @param string $token
     * @param array $config name-value pairs that will be used to initialize the object properties
     * @throws InvalidArgumentException if token is empty or not valid
     */
    public function __construct($token, array $config = [])
    {
        if (empty($token) || !is_string($token)) {
            throw new InvalidArgumentException('Verify email token cannot be blank.');
        }
        $this->_user = User::findByVerificationToken($token);
        if (!$this->_user) {
            throw new InvalidArgumentException('Wrong verify email token.');
        }
        parent::__construct($config);
    }

    /**
     * Verify email
     *
     * @return User|null the saved model or null if saving fails
     * @throws Exception
     */
    public function verifyEmail(): ?User
    {
        $user = $this->_user;
        $user->status = User::STATUS_ACTIVE;
        return $user->save(false) ? $user : null;
    }
}