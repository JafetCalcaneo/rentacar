<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\RenAuto;

/**
 * RenAutoSearch represents the model behind the search form of `app\models\RenAuto`.
 */
class RenAutoSearch extends RenAuto
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['aut_id', 'aut_fkmodelo', 'aut_fkestatus', 'aut_fkimagen'], 'integer'],
            [['aut_color'], 'safe'],
            [['aut_precio'], 'number'],
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
        $query = RenAuto::find();

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
            'aut_id' => $this->aut_id,
            'aut_precio' => $this->aut_precio,
            'aut_fkmodelo' => $this->aut_fkmodelo,
            'aut_fkestatus' => $this->aut_fkestatus,
            'aut_fkimagen' => $this->aut_fkimagen,
        ]);

        $query->andFilterWhere(['like', 'aut_color', $this->aut_color]);

        return $dataProvider;
    }
}
