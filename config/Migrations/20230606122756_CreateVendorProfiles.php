<?php
use Migrations\AbstractMigration;

class CreateVendorProfiles extends AbstractMigration
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
        $table = $this->table('vendor_profiles');
        $table->addColumn('user_id', 'integer')
            ->addColumn('company_name', 'string', ['limit' => 255])
            ->addColumn('contact_person', 'string', ['limit' => 255])
            ->addColumn('address', 'text')
            ->addColumn('phone_number', 'string', ['limit' => 20])
            ->create();
    }
}