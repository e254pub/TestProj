<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Visits;

/**
 * VisitsSearch represents the model behind the search form of `app\models\Visits`.
 */
class VisitsSearch extends Visits
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'usr_id'], 'integer'],
            [['date', 'host', 'ip_addr'], 'safe'],
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
        $query = Visits::find();

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
            'usr_id' => $this->usr_id,
            'date' => $this->date,
        ]);

        $query->andFilterWhere(['like', 'host', $this->host])
            ->andFilterWhere(['like', 'ip_addr', $this->ip_addr]);

        return $dataProvider;
    }
}
