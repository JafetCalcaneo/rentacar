<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\RenCliente;

/**
 * RenClienteSearch represents the model behind the search form of `app\models\RenCliente`.
 */
class RenClienteSearch extends RenCliente
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cli_id'], 'integer'],
            [['cli_nombre', 'cli_paterno', 'cli_materno', 'cli_telefono', 'cli_fechaNacimiento'], 'safe'],
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
        $query = RenCliente::find();

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
            'cli_id' => $this->cli_id,
            'cli_fechaNacimiento' => $this->cli_fechaNacimiento,
        ]);

        $query->andFilterWhere(['like', 'cli_nombre', $this->cli_nombre])
            ->andFilterWhere(['like', 'cli_paterno', $this->cli_paterno])
            ->andFilterWhere(['like', 'cli_materno', $this->cli_materno])
            ->andFilterWhere(['like', 'cli_telefono', $this->cli_telefono]);

        return $dataProvider;
    }
}
