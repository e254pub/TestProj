<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%visits}}`.
 */
class m220201_130343_create_visits_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->createTable('{{%visits}}', [
            'id' => $this->primaryKey(),
            'usr_id' => $this->integer(), //id пользователя
            'date' => $this->dateTime()->defaultValue(date("Y-m-d H:i:s", time())), //дата посещения
            'host' => $this->string()->defaultValue(null), //имя страницы из строки браузера
            'ip_addr' => $this->string()->defaultValue(null), //ip адрес с которого он впервые посетил страницу
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%visits}}');
    }
}
