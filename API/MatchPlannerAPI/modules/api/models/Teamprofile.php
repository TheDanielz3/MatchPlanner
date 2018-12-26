<?php

namespace backend\modules\api\models;

use Yii;

/**
 * This is the model class for table "teamprofile".
 *
 * @property int $id
 * @property string $team_name
 * @property string $members
 * @property int $user_id
 *
 * @property Comment[] $comments
 * @property Event[] $events
 * @property Post[] $posts
 * @property User $user
 * @property Userprofile[] $userprofiles
 */
class Teamprofile extends \yii\db\ActiveRecord
{
    const SCENARIO_CREATE = 'create';
    const SCENARIO_UPDATE = 'update';
    const SCENARIO_DELETE = 'delete';
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'teamprofile';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'team_name', 'members', 'user_id'], 'required'],
            [['id', 'user_id'], 'integer'],
            [['team_name'], 'string', 'max' => 100],
            [['members'], 'string', 'max' => 1200],
            [['id'], 'unique'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
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
            'members' => 'Members',
            'user_id' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['team_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvents()
    {
        return $this->hasMany(Event::className(), ['team_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPosts()
    {
        return $this->hasMany(Post::className(), ['team_id' => 'id']);
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
    public function getUserprofiles()
    {
        return $this->hasMany(Userprofile::className(), ['team_id' => 'id']);
    }
}
