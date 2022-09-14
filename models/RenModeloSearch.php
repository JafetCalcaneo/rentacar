<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\RenModelo;

/**
 * RenModeloSearch represents the model behind the search form of `app\models\RenModelo`.
 */
class RenModeloSearch extends RenModelo
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['mod_id', 'mod_anio', 'mod_fkmarca', 'mod_fktransmision', 'mod_fkcarroceria'], 'integer'],
            [['mod_nombre'], 'safe'],
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
        $query = RenModelo::find();

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
            'mod_id' => $this->mod_id,
            'mod_anio' => $this->mod_anio,
            'mod_fkmarca' => $this->mod_fkmarca,
            'mod_fktransmision' => $this->mod_fktransmision,
            'mod_fkcarroceria' => $this->mod_fkcarroceria,
        ]);

        $query->andFilterWhere(['like', 'mod_nombre', $this->mod_nombre]);

        return $dataProvider;
    }
}
