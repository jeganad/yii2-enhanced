<?php

use yii\db\Schema;
use yii\db\Migration;

class m160130_210746_page extends Migration
{
	public function up()
	{
		$this->createTable('page', [
			'id'              => Schema::TYPE_PK,
			'url_description' => Schema::TYPE_STRING . '(256) NOT NULL',
			'title'           => Schema::TYPE_STRING . '(256) NOT NULL',
			'content'         => Schema::TYPE_TEXT . ' NOT NULL',
			'status'          => Schema::TYPE_INTEGER . '(1) NOT NULL DEFAULT 0',
			'created_by'      => Schema::TYPE_INTEGER . '(11)',
			'updated_by'      => Schema::TYPE_INTEGER . '(11)',
			'created_at'      => Schema::TYPE_INTEGER . ' NOT NULL',
			'updated_at'      => Schema::TYPE_INTEGER . ' NOT NULL',
			'deleted_at'      => Schema::TYPE_INTEGER,
		]);

		$this->addForeignKey('page_fk1', 'page', 'created_by', 'user', 'id', 'SET NULL', 'CASCADE');
		$this->addForeignKey('page_fk2', 'page', 'updated_by', 'user', 'id', 'SET NULL', 'CASCADE');
	}

	public function down()
	{
		$this->dropTable('page');
	}

}
