<?php

namespace frontend\controllers;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Bodega;

/**
 * BodegaSearch represents the model behind the search form about `backend\models\Bodega`.
 */
class BodegaSearch extends Bodega
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['bodega','torre_id'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Bodega::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        
        $query->joinWith('torre')
              ->andFilterWhere(['id' => $this->id,])
              ->andFilterWhere(['like', 'bodega', $this->bodega])
              ->andFilterWhere(['like','Torre.nombre', $this->torre_id]);

        return $dataProvider;
    }
}
