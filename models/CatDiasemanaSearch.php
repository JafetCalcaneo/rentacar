<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CatDiasemana;

/**
 * CatDiasemanaSearch represents the model behind the search form of `app\models\CatDiasemana`.
 */
class CatDiasemanaSearch extends CatDiasemana
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sem_id'], 'integer'],
            [['sem_dia'], 'safe'],
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
        $query = CatDiasemana::find();

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
            'sem_id' => $this->sem_id,
        ]);

        $query->andFilterWhere(['like', 'sem_dia', $this->sem_dia]);

        return $dataProvider;
    }
}
