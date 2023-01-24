<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tasks".
 *
 * @property int $id
 * @property string $title
 * @property resource $description
 * @property string $type
 * @property string|null $company
 * @property string $status
 * @property string $priority
 * @property int $user_id
 * @property string|null $create_time create time
 * @property string|null $update_time update time
 *
 * @property Users $user
 */
class Task extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tasks';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'description', 'user_id'], 'required', 'message' => 'Complete el campo requerido'],
            [['description', 'type', 'status', 'priority'], 'string'],
            [['user_id'], 'integer'],
            [['create_time', 'update_time'], 'safe'],
            [['title', 'company'], 'string', 'max' => 100, 'message' => 'Máximo 100 caracteres'],
            //[['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'description' => Yii::t('app', 'Description'),
            'type' => Yii::t('app', 'Type'),
            'company' => Yii::t('app', 'Company'),
            'status' => Yii::t('app', 'Status'),
            'priority' => Yii::t('app', 'Priority'),
            'user_id' => Yii::t('app', 'User ID'),
            'create_time' => Yii::t('app', 'create time'),
            'update_time' => Yii::t('app', 'update time'),
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'user_id']);
    }
}
