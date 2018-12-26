<?php

namespace backend\modules\api\models;

use Yii;

/**
 * This is the model class for table "comment".
 *
 * @property int $id
 * @property string $content
 * @property string $tag
 * @property string $create_time
 * @property int $user_id
 * @property int $team_id
 * @property int $post_id
 * @property int $event_id
 *
 * @property Event $event
 * @property Post $post
 * @property User $user
 * @property Teamprofile $team
 */
class Comment extends \yii\db\ActiveRecord
{
    const SCENARIO_CREATE = 'create';
    const SCENARIO_UPDATE = 'update';
    const SCENARIO_DELETE = 'delete';
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['content', 'tag', 'create_time', 'post_id', 'event_id'], 'required'],
            [['create_time'], 'safe'],
            [['user_id', 'team_id', 'post_id', 'event_id'], 'integer'],
            [['content'], 'string', 'max' => 1000],
            [['tag'], 'string', 'max' => 70],
            [['event_id'], 'exist', 'skipOnError' => true, 'targetClass' => Event::className(), 'targetAttribute' => ['event_id' => 'id']],
            [['post_id'], 'exist', 'skipOnError' => true, 'targetClass' => Post::className(), 'targetAttribute' => ['post_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['team_id'], 'exist', 'skipOnError' => true, 'targetClass' => Teamprofile::className(), 'targetAttribute' => ['team_id' => 'id']],
        ];
    }

    public function scenarios()
    {
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'content' => 'Content',
            'tag' => 'Tag',
            'create_time' => 'Create Time',
            'user_id' => 'User ID',
            'team_id' => 'Team ID',
            'post_id' => 'Post ID',
            'event_id' => 'Event ID',
        ];
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
    public function getPost()
    {
        return $this->hasOne(Post::className(), ['id' => 'post_id']);
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
