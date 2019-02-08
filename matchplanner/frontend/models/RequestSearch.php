<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Request;

/**
 * RequestSearch represents the model behind the search form of `frontend\models\Request`.
 */
class RequestSearch extends Request
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'userSID', 'userRID', 'view', 'accept'], 'integer'],
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
        $query = Request::find();

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
            'userSID' => $this->userSID,
            'userRID' => $this->userRID,
            'view' => $this->view,
            'accept' => $this->accept,
        ]);

        return $dataProvider;
    }
}
