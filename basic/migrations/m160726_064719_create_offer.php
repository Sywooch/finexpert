<?php

use yii\db\Migration;

class m160726_064719_create_offer extends Migration
{
    public function up()
    {
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%offer}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'min_loan' => $this->integer(),
            'max_loan' => $this->integer(),
            'min_time' => $this->integer(),
            'max_time' => $this->integer(),
            'min_age' => $this->integer(),
            'max_age' => $this->integer(),
            'min_interest_rate_day' => $this->float(),
            'max_interest_rate_day' => $this->float(),
            'interest_rate_month' => $this->float(),
            'interest_rate_year' => $this->float(),
            'document' => $this->string(),
            'citizenship' => $this->string(),
            'registration' => $this->string(),
            'job' => $this->string(),
            'payment' => $this->string(),
            'profit_rating' => $this->integer(),
            'client_rating' => $this->integer(),
            'url' => $this->string(),
            'description' => $this->text(),
            'status' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ], $tableOptions);
    }

    public function down()
    {
        echo "m160726_064719_create_offer cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
