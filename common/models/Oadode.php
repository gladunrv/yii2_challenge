<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "oadode".
 *
 * @property int $id
 * @property int|null $application_id
 * @property int|null $customer_id
 * @property int|null $user_id
 * @property string|null $legal_name
 * @property string|null $business_name
 * @property string|null $business_address
 * @property string|null $business_mailing_address
 * @property string|null $business_phone
 * @property string|null $business_fax
 * @property string|null $business_email
 * @property int|null $application_type
 * @property string|null $business_title
 * @property int|null $lang
 *
 * @property User $user
 * @property DescriptionOfGoods $descriptionOfGoods
 */
class Oadode extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'oadode';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['application_id', 'customer_id', 'user_id', 'application_type', 'lang', 'legal_name', 'business_name', 'business_address', 'business_mailing_address', 'business_phone', 'business_email', 'business_title'], 'required'],
            [['application_id', 'customer_id', 'user_id', 'application_type', 'lang'], 'integer'],
            [['legal_name', 'business_name', 'business_address', 'business_mailing_address', 'business_phone', 'business_fax', 'business_email', 'business_title'], 'string', 'max' => 255],
            ['business_email', 'email'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'application_id' => Yii::t('app', 'Application ID'),
            'customer_id' => Yii::t('app', 'Customer ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'legal_name' => Yii::t('app', 'Legal Name'),
            'business_name' => Yii::t('app', 'Business Name'),
            'business_address' => Yii::t('app', 'Business Address'),
            'business_mailing_address' => Yii::t('app', 'Business Mailing Address'),
            'business_phone' => Yii::t('app', 'Business Phone'),
            'business_fax' => Yii::t('app', 'Business Fax'),
            'business_email' => Yii::t('app', 'Business Email'),
            'application_type' => Yii::t('app', 'Application Type'),
            'business_title' => Yii::t('app', 'Business Title'),
            'lang' => Yii::t('app', 'Lang'),
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * Gets query for [[DescriptionOfGoods]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDescriptionOfGoods()
    {
        return $this->hasMany(DescriptionOfGoods::className(), ['id' => 'user_id', 'application_id' => 'application_id', 'customer_id' => 'customer_id']);
    }
}
