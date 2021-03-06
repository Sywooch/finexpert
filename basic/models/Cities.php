<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cities".
 *
 * @property integer $id
 * @property integer $country_id
 * @property string $city
 * @property string $state
 * @property string $region
 * @property integer $biggest_city
 */
class Cities extends \yii\db\ActiveRecord implements \mrssoft\sitemap\SitemapInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cities';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'country_id', 'city', 'region'], 'required'],
            [['id', 'country_id', 'biggest_city'], 'integer'],
            [['city', 'state', 'region'], 'string', 'max' => 255],
            [['id'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'country_id' => 'Country ID',
            'city' => 'City',
            'state' => 'State',
            'region' => 'Region',
            'biggest_city' => 'Biggest City',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */        
    public static function sitemap()
    {
        return self::find()->where(['<', 'id', '100000']);
    }

    /**
     * @return string
     */
    public function getSitemapUrl()
    {
        return  \yii\helpers\Url::toRoute(['site/city', 'id' => $this->id], true);
    }   
}
