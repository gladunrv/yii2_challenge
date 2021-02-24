<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "description_of_goods".
 *
 * @property int $id
 * @property int|null $application_id
 * @property int|null $customer_id
 * @property int|null $user_id
 * @property string|null $description
 * @property string|null $ecl_group
 * @property string|null $ecl_item
 */
class DescriptionOfGoods extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'description_of_goods';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['application_id', 'customer_id', 'user_id'], 'integer'],
            [['description', 'ecl_group', 'ecl_item'], 'string', 'max' => 255],
            ['description', 'match', 'pattern' => '/^[a-Z]+$/', 'message' => Yii::t('app', 'Invalid characters in description.')],
            ['ecl_group', 'match', 'pattern' => '/^[1-9]+$/', 'message' => Yii::t('app', 'Invalid characters in ecl_group.')],
            ['ecl_item', 'match', 'pattern' => '/^[1-9]+$/', 'message' => Yii::t('app', 'Invalid characters in ecl_item.')],
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
            'description' => Yii::t('app', 'Description'),
            'ecl_group' => Yii::t('app', 'Ecl Group'),
            'ecl_item' => Yii::t('app', 'Ecl Item'),
        ];
    }
}
