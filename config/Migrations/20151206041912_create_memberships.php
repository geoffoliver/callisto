<?php
use Migrations\AbstractMigration;

class CreateMemberships extends AbstractMigration
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
        $table = $this->table('memberships');
        $table->addColumn('id', 'uuid', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('subscription_id', 'uuid', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('reader_id', 'uuid', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('deleted', 'datetime', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('created', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('modified', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addIndex([
            'subscription_id',
        ], [
            'name' => 'BY_SUBSCRIPTION_ID',
            'unique' => false,
        ]);
        $table->addIndex([
            'reader_id',
        ], [
            'name' => 'BY_READER_ID',
            'unique' => false,
        ]);
        $table->addPrimaryKey([
            'id',
        ]);
        $table->create();
    }
}
