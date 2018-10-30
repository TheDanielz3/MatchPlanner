<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "events".
 *
 * @property int $id
 * @property string $event_name
 * @property string $begin_date
 * @property string $end_date
 * @property string $description
 * @property int $user_id
 * @property int $team_id
 *
 * @property Comments[] $comments
 * @property Users $user
 * @property Teams $team
 * @property Posts[] $posts
 */
class Events extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'events';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['event_name', 'begin_date', 'end_date', 'description'], 'required'],
            [['begin_date', 'end_date'], 'safe'],
            [['user_id', 'team_id'], 'integer'],
            [['event_name'], 'string', 'max' => 50],
            [['description'], 'string', 'max' => 500],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['user_id' => 'id']],
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
            'event_name' => 'Event Name',
            'begin_date' => 'Begin Date',
            'end_date' => 'End Date',
            'description' => 'Description',
            'user_id' => 'User ID',
            'team_id' => 'Team ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comments::className(), ['event_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeam()
    {
        return $this->hasOne(Teams::className(), ['id' => 'team_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPosts()
    {
        return $this->hasMany(Posts::className(), ['event_id' => 'id']);
    }
}
