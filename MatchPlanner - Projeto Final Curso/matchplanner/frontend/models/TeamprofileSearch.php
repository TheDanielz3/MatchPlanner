<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Teamprofile;

/**
 * TeamprofileSearch represents the model behind the search form of `frontend\models\Teamprofile`.
 */
class TeamprofileSearch extends Teamprofile
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id'], 'integer'],
            [['team_name', 'member1', 'member2', 'member3', 'member4', 'member5', 'member6'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Teamprofile::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'team_name', $this->team_name])
            ->andFilterWhere(['like', 'member1', $this->member1])
            ->andFilterWhere(['like', 'member2', $this->member2])
            ->andFilterWhere(['like', 'member3', $this->member3])
            ->andFilterWhere(['like', 'member4', $this->member4])
            ->andFilterWhere(['like', 'member5', $this->member5])
            ->andFilterWhere(['like', 'member6', $this->member6]);

        return $dataProvider;
    }
}
