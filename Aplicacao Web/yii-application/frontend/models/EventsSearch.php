<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Events;

/**
 * EventsSearch represents the model behind the search form of `frontend\models\Events`.
 */
class EventsSearch extends Events
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'team_id'], 'integer'],
            [['event_name', 'begin_date', 'end_date', 'description'], 'safe'],
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
        $query = Events::find();

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
            'begin_date' => $this->begin_date,
            'end_date' => $this->end_date,
            'user_id' => $this->user_id,
            'team_id' => $this->team_id,
        ]);

        $query->andFilterWhere(['like', 'event_name', $this->event_name])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
