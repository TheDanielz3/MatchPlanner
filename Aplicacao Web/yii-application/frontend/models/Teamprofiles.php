<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "teamprofiles".
 *
 * @property int $id
 * @property string $team_name
 * @property string $members
 *
 * @property Comments[] $comments
 * @property Events[] $events
 * @property Posts[] $posts
 * @property Userprofiles[] $userprofiles
 */
class Teamprofiles extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'teamprofiles';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['team_name', 'members'], 'required'],
            [['team_name'], 'string', 'max' => 100],
            [['members'], 'string', 'max' => 1200],
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
    public function getUserprofiles()
    {
        return $this->hasMany(Userprofiles::className(), ['team_id' => 'id']);
    }
}
