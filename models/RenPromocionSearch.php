<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\RenPromocion;

/**
 * RenPromocionSearch represents the model behind the search form of `app\models\RenPromocion`.
 */
class RenPromocionSearch extends RenPromocion
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pro_id', 'pro_fkauto'], 'integer'],
            [['pro_descripcion', 'pro_imagen', 'pro_fechaInicio', 'pro_fechaFinal'], 'safe'],
            [['pro_descuento'], 'number'],
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
        $query = RenPromocion::find();

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
            'pro_id' => $this->pro_id,
            'pro_fechaInicio' => $this->pro_fechaInicio,
            'pro_fechaFinal' => $this->pro_fechaFinal,
            'pro_descuento' => $this->pro_descuento,
            'pro_fkauto' => $this->pro_fkauto,
        ]);

        $query->andFilterWhere(['like', 'pro_descripcion', $this->pro_descripcion])
            ->andFilterWhere(['like', 'pro_imagen', $this->pro_imagen]);

        return $dataProvider;
    }
}
