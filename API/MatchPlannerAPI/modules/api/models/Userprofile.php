<?php

namespace backend\modules\api\models;

use Yii;

/**
 * This is the model class for table "userprofile".
 *
 * @property int $id
 * @property string $firstname
 * @property string $surnames
 * @property string $birthdate
 * @property string $sex
 * @property int $user_id
 * @property int $team_id
 *
 * @property User $user
 * @property Teamprofile $team
 */
class Userprofile extends \yii\db\ActiveRecord
{
    const SCENARIO_CREATE = 'create';
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'userprofile';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'firstname', 'surnames', 'birthdate', 'sex'], 'required'],
            [['id', 'user_id', 'team_id'], 'integer'],
            [['birthdate'], 'safe'],
            [['firstname', 'surnames'], 'string', 'max' => 50],
            [['sex'], 'string', 'max' => 1],
            [['id'], 'unique'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['team_id'], 'exist', 'skipOnError' => true, 'targetClass' => Teamprofile::className(), 'targetAttribute' => ['team_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'firstname' => 'Firstname',
            'surnames' => 'Surnames',
            'birthdate' => 'Birthdate',
            'sex' => 'Sex',
            'user_id' => 'User ID',
            'team_id' => 'Team ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeam()
    {
        return $this->hasOne(Teamprofile::className(), ['id' => 'team_id']);
    }
}
