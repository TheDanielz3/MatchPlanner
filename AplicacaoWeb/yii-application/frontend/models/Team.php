<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "teams".
 *
 * @property int $id
 * @property string $team_name
 * @property string $creation_date
 * @property string $members
 * @property string $email
 * @property string $username
 * @property string $password
 *
 * @property Comments[] $comments
 * @property Events[] $events
 * @property Posts[] $posts
 * @property Users[] $users
 */
class Team extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'teams';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['team_name', 'creation_date', 'members', 'email', 'username', 'password'], 'required'],
            [['creation_date'], 'safe'],
            [['team_name', 'email'], 'string', 'max' => 100],
            [['members'], 'string', 'max' => 1200],
            [['username'], 'string', 'max' => 70],
            [['password'], 'string', 'max' => 256],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'team_name' => 'Team Name',
            'creation_date' => 'Creation Date',
            'members' => 'Members',
            'email' => 'Email',
            'username' => 'Username',
            'password' => 'Password',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comments::className(), ['team_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvents()
    {
        return $this->hasMany(Events::className(), ['team_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPosts()
    {
        return $this->hasMany(Posts::className(), ['team_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(Users::className(), ['team_id' => 'id']);
    }
}
