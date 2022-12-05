<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\Dashboard;
use yii\data\ActiveDataProvider;

/**
 * DashboardSearch represents the model behind the search form of `app\models\Dashboard`.
 */
class DashboardSearch extends Dashboard
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['das_id', 'das_orden', 'das_estatus'], 'integer'],
            [['das_imagen', 'das_titulo', 'das_url', 'das_roles'], 'safe'],
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
        $query = Dashboard::find();

        // add conditions that should always apply here
        if (!Yii::$app->user->isSuperAdmin) {
            //Filtrando los botones activos con "das_estatus"
            $query = $query->where(['das_estatus' => 1]);
            //Filtrando los botones por roles con "das_roles"
            $roles = Yii::$app->user->identity->roles;
            foreach ($roles as $rol) {
                $query = $query->andWhere(['like', 'das_roles', $rol->name]);
            }
            //Ordenando los botones con "das_orden"
            $query = $query->orderBy(['das_orden' => SORT_ASC]);
        }


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
            'das_id' => $this->das_id,
            'das_orden' => $this->das_orden,
            'das_estatus' => $this->das_estatus,
        ]);

        $query->andFilterWhere(['like', 'das_imagen', $this->das_imagen])
            ->andFilterWhere(['like', 'das_titulo', $this->das_titulo])
            ->andFilterWhere(['like', 'das_url', $this->das_url])
            ->andFilterWhere(['like', 'das_roles', $this->das_roles]);

        return $dataProvider;
    }
}
