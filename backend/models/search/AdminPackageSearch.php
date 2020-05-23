<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\AdminPackage;

/**
 * AdminPackageSearch represents the model behind the search form of `app\models\AdminPackage`.
 */
class AdminPackageSearch extends AdminPackage
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'admin_id', 'created_at', 'updated_at', 'discount'], 'integer'],
            [['name', 'type', 'is_trial', 'status', 'currency', 'client_status'], 'safe'],
            [['amount', 'credit'], 'number'],
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
        $query = AdminPackage::find();

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
            'id' => $this->id,
            'admin_id' => $this->admin_id,
            'amount' => $this->amount,
            'credit' => $this->credit,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'discount' => $this->discount,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'is_trial', $this->is_trial])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'currency', $this->currency])
            ->andFilterWhere(['like', 'client_status', $this->client_status]);

        return $dataProvider;
    }
}
