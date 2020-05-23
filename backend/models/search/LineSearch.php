<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Line;
use yii\data\Sort;

/**
 * LineSearch represents the model behind the search form of `app\models\Line`.
 */
class LineSearch extends Line
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'member_id', 'exp_date', 'admin_enabled', 'enabled', 'max_connections', 'is_restreamer', 'is_trial', 'created_at', 'created_by', 'pair_id', 'is_mag', 'is_e2', 'force_server_id', 'is_isplock', 'is_stalker', 'bypass_ua'], 'integer'],
            [['username', 'password', 'admin_notes', 'reseller_notes', 'bouquet','mac','packages', 'allowed_ips', 'allowed_ua', 'isp_desc', 'forced_country', 'as_number', 'play_token','status'], 'safe'],
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


        $query = Line::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $dataProvider->setSort([
            'defaultOrder' => [
                'created_at' => SORT_DESC
            ]
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
            'member_id' => $this->member_id,
            'exp_date' => $this->exp_date,
            'admin_enabled' => $this->admin_enabled,
            'enabled' => $this->enabled,
            'max_connections' => $this->max_connections,
            'is_restreamer' => $this->is_restreamer,
            'is_trial' => $this->is_trial,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'pair_id' => $this->pair_id,
            'is_mag' => $this->is_mag,
            'is_e2' => $this->is_e2,
            'force_server_id' => $this->force_server_id,
            'is_isplock' => $this->is_isplock,
            'is_stalker' => $this->is_stalker,
            'bypass_ua' => $this->bypass_ua,
        ]);

        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'password', $this->password])
            ->andFilterWhere(['like', 'admin_notes', $this->admin_notes])
            ->andFilterWhere(['like', 'reseller_notes', $this->reseller_notes])
            ->andFilterWhere(['like', 'bouquet', $this->bouquet])
            ->andFilterWhere(['like', 'allowed_ips', $this->allowed_ips])
            ->andFilterWhere(['like', 'allowed_ua', $this->allowed_ua])
            ->andFilterWhere(['like', 'isp_desc', $this->isp_desc])
            ->andFilterWhere(['like', 'forced_country', $this->forced_country])
            ->andFilterWhere(['like', 'as_number', $this->as_number])
            ->andFilterWhere(['like', 'play_token', $this->play_token])
            ->andFilterWhere(['like', 'package', $this->packages]);
        if ($this->status !== '') {
            switch ($this->status) {
                case "active":
                    $query->andFilterWhere([
                        ">",
                        'exp_date',
                        time(),
                    ])->andFilterWhere([
                        "like",
                        'admin_enabled',
                        Line::ADMIN_ENABLE,
                    ])->andFilterWhere([
                        "like",
                        'enabled',
                        Line::ENABLE,
                    ]);
                    break;
                case "ban":
                    $query->andFilterWhere([
                        'like',
                        'enabled',
                        Line::DISABLE,
                    ])->andFilterWhere([
                        'like',
                        'admin_enabled',
                        Line::ADMIN_ENABLE,
                    ]);
                    break;
                case "block":
                    $query->andFilterWhere([
                        'like',
                        'admin_enabled',
                        Line::ADMIN_DISABLE
                    ]);
                    break;
                case "expired":
                    $query->andFilterWhere([
                        "<=",
                        'exp_date',
                        time(),
                    ])->andFilterWhere([
                        "like",
                        'admin_enabled',
                        Line::ADMIN_ENABLE,
                    ])->andFilterWhere([
                        "like",
                        'enabled',
                        Line::ENABLE,
                    ]);
                    break;
            }
        }

        return $dataProvider;
    }
}
