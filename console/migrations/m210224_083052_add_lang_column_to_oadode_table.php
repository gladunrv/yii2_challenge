<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%oadode}}`.
 */
class m210224_083052_add_lang_column_to_oadode_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%oadode}}', 'lang', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%oadode}}', 'lang');
    }
}
