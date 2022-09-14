<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CatImagenauto;

/**
 * CatImagenautoSearch represents the model behind the search form of `app\models\CatImagenauto`.
 */
class CatImagenautoSearch extends CatImagenauto
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['img_id', 'img_fkauto'], 'integer'],
            [['img_url'], 'safe'],
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
        $query = CatImagenauto::find();

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
            'img_id' => $this->img_id,
            'img_fkauto' => $this->img_fkauto,
        ]);

        $query->andFilterWhere(['like', 'img_url', $this->img_url]);

        return $dataProvider;
    }
}
