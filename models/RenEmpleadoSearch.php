<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\RenEmpleado;

/**
 * RenEmpleadoSearch represents the model behind the search form of `app\models\RenEmpleado`.
 */
class RenEmpleadoSearch extends RenEmpleado
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['emp_id', 'emp_cargo', 'emp_fkuser'], 'integer'],
            [['emp_nombre', 'emp_paterno', 'emp_materno'], 'safe'],
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
        $query = RenEmpleado::find();

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
            'emp_id' => $this->emp_id,
            'emp_cargo' => $this->emp_cargo,
            'emp_fkuser' => $this->emp_fkuser,
        ]);

        $query->andFilterWhere(['like', 'emp_nombre', $this->emp_nombre])
            ->andFilterWhere(['like', 'emp_paterno', $this->emp_paterno])
            ->andFilterWhere(['like', 'emp_materno', $this->emp_materno]);

        return $dataProvider;
    }
}
