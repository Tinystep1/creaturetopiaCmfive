<?php

class CreaturetopiainitialMigration extends CmfiveMigration {

	public function up() {
		// UP
		$column = parent::Column();
		$column->setName('id')
				->setType('biginteger')
				->setIdentity(true);

		if (!$this->hasTable("creaturetopia_petinfo")) { //it can be helpful to check that the table name is not used
			$this->table("creaturetopia_petinfo", [ // table names should be appended with 'ModuleName_'
				"id" => false,
				"primary_key" => "id"
			])->addColumn($column) // add the id column
			//column names correspond to filler text in petinfo.html page in Creatretopia-2 repository.
			->addStringColumn('animal_name')
			->addTextColumn('description_of_animal')
			->addStringColumn('item_list')
			->addStringColumn('stat_list')
			->addCmfiveParameters() // this function adds some standard columns used in cmfive. dt_created, dt_modified, creator_id, modifier_id, and is_deleted.
			->create();
		}
	}

	public function down() {
		// DOWN
		$this->hasTable('creaturetopia_petinfo') ? $this->dropTable('creaturetopia_petinfo') : null;
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
