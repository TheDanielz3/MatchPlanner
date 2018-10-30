<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $firstname
 * @property string $surnames
 * @property string $email
 * @property string $birthdate
 * @property string $creation_date
 * @property int $sex
 * @property string $username
 * @property string $password
 * @property int $team_id
 *
 * @property Comments[] $comments
 * @property Events[] $events
 * @property Posts[] $posts
 * @property Userlogin[] $userlogins
 * @property Teams $team
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['firstname', 'surnames', 'email', 'birthdate', 'creation_date', 'sex', 'username', 'password'], 'required'],
            [['birthdate', 'creation_date'], 'safe'],
            [['sex', 'team_id'], 'integer'],
            [['firstname', 'surnames'], 'string', 'max' => 50],
            [['email'], 'string', 'max' => 100],
            [['username'], 'string', 'max' => 70],
            [['password'], 'string', 'max' => 256],
            [['team_id'], 'exist', 'skipOnError' => true, 'targetClass' => Teams::className(), 'targetAttribute' => ['team_id' => 'id']],
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
            'email' => 'Email',
            'birthdate' => 'Birthdate',
            'creation_date' => 'Creation Date',
            'sex' => 'Sex',
            'username' => 'Username',
            'password' => 'Password',
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
    public function getUserlogins()
    {
        return $this->hasMany(Userlogin::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeam()
    {
        return $this->hasOne(Teams::className(), ['id' => 'team_id']);
    }
}
