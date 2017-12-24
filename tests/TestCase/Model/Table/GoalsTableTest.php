<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\GoalsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\GoalsTable Test Case
 */
class GoalsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\GoalsTable
     */
    public $Goals;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.goals'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Goals') ? [] : ['className' => GoalsTable::class];
        $this->Goals = TableRegistry::get('Goals', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Goals);

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
}
