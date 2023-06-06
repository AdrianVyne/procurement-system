<?php
use Migrations\AbstractMigration;

class AddBidsForeignKeys extends AbstractMigration
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
        $table = $this->table('bids');
        $table->addForeignKey('listing_id', 'procurements', 'id', ['delete' => 'CASCADE', 'update' => 'CASCADE'])
            ->addForeignKey('vendor_id', 'users', 'id', ['delete' => 'CASCADE', 'update' => 'CASCADE'])
            ->update();
    }
}