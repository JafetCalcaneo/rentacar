<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\RenRenta;

/**
 * RenRentaSearch represents the model behind the search form of `app\models\RenRenta`.
 */
class RenRentaSearch extends RenRenta
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ren_id', 'ren_promocion', 'ren_fkmetodoPago', 'ren_fkcliente', 'ren_fkauto'], 'integer'],
            [['ren_fechaPago', 'ren_fechaInicio', 'ren_fechaFinal', 'ren_fechaEntregado'], 'safe'],
            [['ren_monto'], 'number'],
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
        $query = RenRenta::find();

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
            'ren_id' => $this->ren_id,
            'ren_fechaPago' => $this->ren_fechaPago,
            'ren_fechaInicio' => $this->ren_fechaInicio,
            'ren_fechaFinal' => $this->ren_fechaFinal,
            'ren_fechaEntregado' => $this->ren_fechaEntregado,
            'ren_monto' => $this->ren_monto,
            'ren_promocion' => $this->ren_promocion,
            'ren_fkmetodoPago' => $this->ren_fkmetodoPago,
            'ren_fkcliente' => $this->ren_fkcliente,
            'ren_fkauto' => $this->ren_fkauto,
        ]);

        return $dataProvider;
    }
}
