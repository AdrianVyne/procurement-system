<?php
use Migrations\AbstractMigration;

class AddProcurementsForeignKeys extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('procurements');
        $table->addForeignKey('organization_id', 'users', 'id', ['delete' => 'CASCADE', 'update' => 'CASCADE'])
            ->update();
    }
}