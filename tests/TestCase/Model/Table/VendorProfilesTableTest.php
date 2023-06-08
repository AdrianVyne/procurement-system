<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\VendorProfilesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\VendorProfilesTable Test Case
 */
class VendorProfilesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\VendorProfilesTable
     */
    public $VendorProfiles;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.VendorProfiles',
        'app.Users',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('VendorProfiles') ? [] : ['className' => VendorProfilesTable::class];
        $this->VendorProfiles = TableRegistry::getTableLocator()->get('VendorProfiles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->VendorProfiles);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
