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
            [['img_url', 'img_titulo', 'img_descripcion', 'img_seccion', 'img_estatus', 'img_href'], 'safe'],
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

        $query->andFilterWhere(['like', 'img_url', $this->img_url])
            ->andFilterWhere(['like', 'img_titulo', $this->img_titulo])
            ->andFilterWhere(['like', 'img_descripcion', $this->img_descripcion])
            ->andFilterWhere(['like', 'img_seccion', $this->img_seccion])
            ->andFilterWhere(['like', 'img_estatus', $this->img_estatus])
            ->andFilterWhere(['like', 'img_href', $this->img_href]);

        return $dataProvider;
    }
}
