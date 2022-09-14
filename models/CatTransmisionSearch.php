<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CatTransmision;

/**
 * CatTransmisionSearch represents the model behind the search form of `app\models\CatTransmision`.
 */
class CatTransmisionSearch extends CatTransmision
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tra_id'], 'integer'],
            [['tra_nombre'], 'safe'],
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
        $query = CatTransmision::find();

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
            'tra_id' => $this->tra_id,
        ]);

        $query->andFilterWhere(['like', 'tra_nombre', $this->tra_nombre]);

        return $dataProvider;
    }
}
