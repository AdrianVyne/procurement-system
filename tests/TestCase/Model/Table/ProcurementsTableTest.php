<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProcurementsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProcurementsTable Test Case
 */
class ProcurementsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ProcurementsTable
     */
    public $Procurements;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
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
        $config = TableRegistry::getTableLocator()->exists('Procurements') ? [] : ['className' => ProcurementsTable::class];
        $this->Procurements = TableRegistry::getTableLocator()->get('Procurements', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Procurements);

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
