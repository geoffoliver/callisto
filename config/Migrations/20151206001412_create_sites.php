<?php
use Migrations\AbstractMigration;

class CreateSites extends AbstractMigration
{

    public $autoId = false;

    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('sites');
        $table->addColumn('id', 'uuid', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('name', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('domain', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('publisher_id', 'uuid', [
            'default' => null,
            'null' => false,
		]);
		$table->addColumn('active', 'boolean', [
			'default' => true,
			'null' => false
		]);
        $table->addColumn('created', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('modified', 'datetime', [
            'default' => null,
            'null' => false,
		]);
		$table->addColumn('deleted', 'datetime', [
			'default' => null,
			'null' => true
		]);
        $table->addPrimaryKey([
            'id',
        ]);
        $table->create();
    }
}
