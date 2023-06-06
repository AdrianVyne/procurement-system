<?php
use Migrations\AbstractMigration;

class CreateBids extends AbstractMigration
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
        $table->addColumn('listing_id', 'integer')
            ->addColumn('vendor_id', 'integer')
            ->addColumn('bid_amount', 'decimal', ['precision' => 10, 'scale' => 2])
            ->addColumn('status', 'string', ['limit' => 20])
            ->create();
    }
}