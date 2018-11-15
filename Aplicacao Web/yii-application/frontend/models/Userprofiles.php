<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "userprofiles".
 *
 * @property int $id
 * @property string $firstname
 * @property string $surnames
 * @property string $birthdate
 * @property int $sex
 * @property int $user_id
 * @property int $team_id
 *
 * @property Comments[] $comments
 * @property Events[] $events
 * @property Posts[] $posts
 * @property Teamprofiles $team
 */
class Userprofiles extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'userprofiles';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['firstname', 'surnames', 'birthdate', 'sex', 'user_id'], 'required'],
            [['birthdate'], 'safe'],
            [['sex', 'user_id', 'team_id'], 'integer'],
            [['firstname', 'surnames'], 'string', 'max' => 50],
            [['team_id'], 'exist', 'skipOnError' => true, 'targetClass' => Teamprofiles::className(), 'targetAttribute' => ['team_id' => 'id']],
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
    public function getComments()
    {
        return $this->hasMany(Comments::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvents()
    {
        return $this->hasMany(Events::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPosts()
    {
        return $this->hasMany(Posts::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeam()
    {
        return $this->hasOne(Teamprofiles::className(), ['id' => 'team_id']);
    }
}
