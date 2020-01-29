<?php

class CreaturetopiaItemTable extends CmfiveMigration {

	public function up() {
		// UP
		$column = parent::Column();
		$column->setName('id')
				->setType('biginteger')
				->setIdentity(true);

				if (!$this->hasTable("creaturetopia_item")) { //it can be helpful to check that the table name is not used
					$this->table("creaturetopia_item", [ // table names should be appended with 'ModuleName_'
						"id" => false,
						"primary_key" => "id"
					])->addColumn($column) // add the id column
					//column names correspond to filler text in petinfo.html page in Creatretopia-2 repository.
					->addStringColumn('item_name')
					->addTextColumn('item_description', 'text', ['null' => true])
					->addStringColumn('stats_affected')
					->addCmfiveParameters() // this function adds some standard columns used in cmfive. dt_created, dt_modified, creator_id, modifier_id, and is_deleted.
					->create();
				}
				if (!$this->hasTable("creaturetopia_item_link")) { //it can be helpful to check that the table name is not used
					$this->table("creaturetopia_item_link", [ // table names should be appended with 'ModuleName_'
						"id" => false,
						"primary_key" => "id"
					])->addColumn($column) // add the id column
					//column names correspond to filler text in petinfo.html page in Creatretopia-2 repository.
					->addIdColumn('info_id')
					->addIdColumn('item_id')
					->addCmfiveParameters() // this function adds some standard columns used in cmfive. dt_created, dt_modified, creator_id, modifier_id, and is_deleted.
					->create();
				}
	}

	public function down() {
		// DOWN
		$this->hasTable('creaturetopia_item') ? $this->dropTable('creaturetopia_item') : null;
		$this->hasTable('creaturetopia_item_link') ? $this->dropTable('creaturetopia_item_link') : null;
	}

	public function preText()
	{
		return null;
	}

	public function postText()
	{
		return null;
	}

	public function description()
	{
		return null;
	}
}
