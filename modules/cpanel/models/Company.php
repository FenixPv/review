<?php

namespace app\modules\cpanel\models;

use Yii;

/**
 * This is the model class for table "company".
 *
 * @property int $id
 * @property int|null $category_id
 * @property int $created_at
 * @property int $updated_at
 * @property string|null $name
 * @property string|null $description
 * @property int $is_verified
 *
 * @property CategoryCompany $category
 * @property Comment[] $comments
 * @property CompanyContact[] $companyContacts
 */
class Company extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'company';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'created_at', 'updated_at', 'is_verified'], 'integer'],
            [['created_at', 'updated_at'], 'required'],
            [['description'], 'string'],
            [['name'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => CategoryCompany::class, 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Category ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'name' => 'Name',
            'description' => 'Description',
            'is_verified' => 'Is Verified',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(CategoryCompany::class, ['id' => 'category_id']);
    }

    /**
     * Gets query for [[Comments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::class, ['company_id' => 'id']);
    }

    /**
     * Gets query for [[CompanyContacts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCompanyContacts()
    {
        return $this->hasMany(CompanyContact::class, ['company_id' => 'id']);
    }
}
