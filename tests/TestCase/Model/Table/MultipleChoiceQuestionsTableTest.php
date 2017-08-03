<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MultipleChoiceQuestionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MultipleChoiceQuestionsTable Test Case
 */
class MultipleChoiceQuestionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MultipleChoiceQuestionsTable
     */
    public $MultipleChoiceQuestions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.multiple_choice_questions',
        'app.questions',
        'app.multiple_choice_questions_questions',
        'app.steps',
        'app.multiple_choice_questions_steps',
        'app.tries',
        'app.multiple_choice_questions_tries'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('MultipleChoiceQuestions') ? [] : ['className' => MultipleChoiceQuestionsTable::class];
        $this->MultipleChoiceQuestions = TableRegistry::get('MultipleChoiceQuestions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MultipleChoiceQuestions);

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
