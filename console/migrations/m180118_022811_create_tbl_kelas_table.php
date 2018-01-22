<?php

use yii\db\Migration;

/**
 * Handles the creation of table `tbl_kelas`.
 * Has foreign keys to the tables:
 *
 * - `tbl_user`
 * - `tbl_useer`
 */
class m180118_022811_create_tbl_kelas_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('tbl_kelas', [
            'id' => $this->primaryKey(),
            'nama' => $this->string(255)->notNull(),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
            'created_by' => $this->integer()->notNull(),
            'updated_by' => $this->integer()->notNull(),
        ]);

        // creates index for column `created_by`
        $this->createIndex(
            'idx-tbl_kelas-created_by',
            'tbl_kelas',
            'created_by'
        );

        // add foreign key for table `tbl_user`
        $this->addForeignKey(
            'fk-tbl_kelas-created_by',
            'tbl_kelas',
            'created_by',
            'tbl_user',
            'id',
            'CASCADE'
        );

        // creates index for column `updated_by`
        $this->createIndex(
            'idx-tbl_kelas-updated_by',
            'tbl_kelas',
            'updated_by'
        );

        // add foreign key for table `tbl_useer`
        $this->addForeignKey(
            'fk-tbl_kelas-updated_by',
            'tbl_kelas',
            'updated_by',
            'tbl_useer',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        // drops foreign key for table `tbl_user`
        $this->dropForeignKey(
            'fk-tbl_kelas-created_by',
            'tbl_kelas'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            'idx-tbl_kelas-created_by',
            'tbl_kelas'
        );

        // drops foreign key for table `tbl_useer`
        $this->dropForeignKey(
            'fk-tbl_kelas-updated_by',
            'tbl_kelas'
        );

        // drops index for column `updated_by`
        $this->dropIndex(
            'idx-tbl_kelas-updated_by',
            'tbl_kelas'
        );

        $this->dropTable('tbl_kelas');
    }
}
