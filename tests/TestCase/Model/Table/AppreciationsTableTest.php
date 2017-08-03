<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AppreciationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AppreciationsTable Test Case
 */
class AppreciationsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AppreciationsTable
     */
    public $Appreciations;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.appreciations',
        'app.opened_answers',
        'app.appreciations_opened_answers'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Appreciations') ? [] : ['className' => AppreciationsTable::class];
        $this->Appreciations = TableRegistry::get('Appreciations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Appreciations);

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
