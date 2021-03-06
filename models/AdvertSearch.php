<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Advert;

/**
 * AdvertSearch represents the model behind the search form about `app\models\Advert`.
 */
class AdvertSearch extends Advert
{
    public $max_price;
    public $min_price;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_advert',  'id_type', 'id_city'], 'integer'],
            [['id_user','title', 'slug', 'description', 'trash_date','id_animal','max_price','min_price'], 'safe'],
          //  [['price'], 'number'],
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
        $query = Advert::find();

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

        $query->joinWith('idUser');
        $query->joinWith('idAnimal');

        // grid filtering conditions
        $query->andFilterWhere([
            'id_advert' => $this->id_advert,
            'created' => $this->created,
            'valid_until' => $this->valid_until,
            'price' => $this->price,
            'id_type' => $this->id_type,
            'id_city' => $this->id_city,
            'trash_date' => $this->trash_date
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'slug', $this->slug])
            ->andFilterWhere(['like', 'user.username', $this->id_user])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'animal.id_animal', $this->id_animal])
            ->andFilterWhere(['between', 'price',$this->min_price, $this->max_price]);;

        return $dataProvider;
    }
}
