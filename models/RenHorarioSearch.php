<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\RenHorario;

/**
 * RenHorarioSearch represents the model behind the search form of `app\models\RenHorario`.
 */
class RenHorarioSearch extends RenHorario
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['hor_id', 'hor_estatus', 'hor_fkdiaSemana'], 'integer'],
            [['hor_horaInicio', 'hor_horaCierre'], 'safe'],
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
        $query = RenHorario::find();

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
            'hor_id' => $this->hor_id,
            'hor_horaInicio' => $this->hor_horaInicio,
            'hor_horaCierre' => $this->hor_horaCierre,
            'hor_estatus' => $this->hor_estatus,
            'hor_fkdiaSemana' => $this->hor_fkdiaSemana,
        ]);

        return $dataProvider;
    }
}
