<?php
use Migrations\AbstractMigration;

class CreateProcurements extends AbstractMigration
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
        $table->addColumn('organization_id', 'integer')
            ->addColumn('title', 'string', ['limit' => 255])
            ->addColumn('description', 'text')
            ->addColumn('category', 'string', ['limit' => 255])
            ->addColumn('deadline', 'datetime')
            ->addColumn('budget', 'decimal', ['precision' => 10, 'scale' => 2])
            ->create();
    }
}