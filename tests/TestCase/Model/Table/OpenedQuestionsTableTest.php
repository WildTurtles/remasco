<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OpenedQuestionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OpenedQuestionsTable Test Case
 */
class OpenedQuestionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\OpenedQuestionsTable
     */
    public $OpenedQuestions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.opened_questions',
        'app.expected_answers',
        'app.steps',
        'app.opened_questions_steps'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('OpenedQuestions') ? [] : ['className' => OpenedQuestionsTable::class];
        $this->OpenedQuestions = TableRegistry::get('OpenedQuestions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->OpenedQuestions);

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
