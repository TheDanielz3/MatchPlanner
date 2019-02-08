<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "post".
 *
 * @property int $id
 * @property string $title
 * @property string $content
 * @property string $tag
 * @property string $create_time
 * @property string $image
 * @property int $user_id
 * @property int $team_id
 * @property int $event_id
 *
 * @property Comment[] $comments
 * @property Event $event
 * @property User $user
 * @property Teamprofile $team
 */
class Post extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'content', 'tag', 'create_time', 'event_id'], 'required'],
            [['create_time'], 'safe'],
            [['user_id', 'team_id', 'event_id'], 'integer'],
            [['title', 'tag'], 'string', 'max' => 70],
            [['content'], 'string', 'max' => 1000],
            [['image'], 'string', 'max' => 200],
            [['event_id'], 'exist', 'skipOnError' => true, 'targetClass' => Event::className(), 'targetAttribute' => ['event_id' => 'id']],
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
            'title' => 'Title',
            'content' => 'Content',
            'tag' => 'Tag',
            'create_time' => 'Create Time',
            'image' => 'Image',
            'user_id' => 'User ID',
            'team_id' => 'Team ID',
            'event_id' => 'Event ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['post_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvent()
    {
        return $this->hasOne(Event::className(), ['id' => 'event_id']);
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
