<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
/**
 * This is the model class for table "offer".
 *
 * @property integer $id
 * @property string $name
 * @property integer $min_loan
 * @property integer $max_loan
 * @property integer $min_time
 * @property integer $max_time
 * @property integer $min_age
 * @property integer $max_age
 * @property double $min_interest_rate_day
 * @property double $max_interest_rate_day
 * @property double $interest_rate_month
 * @property double $interest_rate_year
 * @property string $document
 * @property string $citizenship
 * @property string $registration
 * @property string $job
 * @property string $payment
 * @property integer $profit_rating
 * @property integer $client_rating
 * @property string $url
 * @property string $description
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class Offer extends \yii\db\ActiveRecord
{
    const ACTIVE = 10;
    const PENDING = 5;
    const STOPPED = 1;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'offer';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['min_loan', 'max_loan', 'min_time', 'max_time', 'min_age', 'max_age', 'profit_rating', 'client_rating', 'status', 'created_at', 'updated_at'], 'integer'],
            [['min_interest_rate_day', 'max_interest_rate_day', 'interest_rate_month', 'interest_rate_year'], 'number'],
            [['description'], 'string'],
            [['name', 'document', 'citizenship', 'registration', 'job', 'payment', 'url'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'min_loan' => 'Min Loan',
            'max_loan' => 'Max Loan',
            'min_time' => 'Min Time',
            'max_time' => 'Max Time',
            'min_age' => 'Min Age',
            'max_age' => 'Max Age',
            'min_interest_rate_day' => 'Min Interest Rate Day',
            'max_interest_rate_day' => 'Max Interest Rate Day',
            'interest_rate_month' => 'Interest Rate Month',
            'interest_rate_year' => 'Interest Rate Year',
            'document' => 'Document',
            'citizenship' => 'Citizenship',
            'registration' => 'Registration',
            'job' => 'Job',
            'payment' => 'Payment',
            'profit_rating' => 'Profit Rating',
            'client_rating' => 'Client Rating',
            'url' => 'Url',
            'description' => 'Description',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function getStatusName()
    {
        if ($this->status == self::STOPPED) {
            return 'Stopped';
        }
        if ($this->status == self::PENDING) {
            return 'Pending';
        }
        if ($this->status == self::ACTIVE) {
            return 'Active';
        }
    }
}
