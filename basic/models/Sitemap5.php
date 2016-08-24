<?php

namespace app\models;

use Yii;
/**
 * This is the model class for table "ru_city2".
 *
 * @property integer $id
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $city_id
 * @property string $name
 * @property string $district
 * @property string $region
 * @property double $lon
 * @property double $lat
 */
class Sitemap5 extends \yii\db\ActiveRecord  implements \mrssoft\sitemap\SitemapInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ru_city2';
    }

    

    /**
     * @return \yii\db\ActiveQuery
     */        
    public static function sitemap()
    {
        return self::find()->where(['and',['>=','id', 40000],['<','id', 50000]]);
    }

    /**
     * @return string
     */
    public function getSitemapUrl()
    {
        return  \yii\helpers\Url::toRoute(['site/city', 'id' => $this->id], true);
    }  
}
