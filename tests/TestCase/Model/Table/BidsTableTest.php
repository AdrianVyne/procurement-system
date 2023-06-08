<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BidsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BidsTable Test Case
 */
class BidsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\BidsTable
     */
    public $Bids;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Bids',
        'app.Procurements',
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
        $config = TableRegistry::getTableLocator()->exists('Bids') ? [] : ['className' => BidsTable::class];
        $this->Bids = TableRegistry::getTableLocator()->get('Bids', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Bids);

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
