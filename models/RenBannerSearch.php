<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\RenBanner;

/**
 * RenBannerSearch represents the model behind the search form of `app\models\RenBanner`.
 */
class RenBannerSearch extends RenBanner
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ban_id'], 'integer'],
            [['ban_url', 'ban_descripcion'], 'safe'],
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
        $query = RenBanner::find();

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
            'ban_id' => $this->ban_id,
        ]);

        $query->andFilterWhere(['like', 'ban_url', $this->ban_url])
            ->andFilterWhere(['like', 'ban_descripcion', $this->ban_descripcion]);

        return $dataProvider;
    }
}
