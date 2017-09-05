<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\QuestionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\QuestionsTable Test Case
 */
class QuestionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\QuestionsTable
     */
    public $Questions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.questions',
        'app.answers',
        'app.answers_questions',
        'app.questions_tries',
        'app.answers_questions_tries',
        'app.tries',
        'app.users',
        'app.groups',
        'app.topics',
        'app.groups_topics',
        'app.chapters',
        'app.paths',
        'app.steps',
        'app.links',
        'app.links_steps',
        'app.multiple_choice_questions',
        'app.multiple_choice_questions_questions',
        'app.multiple_choice_questions_steps',
        'app.multiple_choice_questions_tries',
        'app.opened_questions',
        'app.expected_answers',
        'app.opened_questions_steps',
        'app.chapters_paths',
        'app.paths_tries',
        'app.paths_users',
        'app.topics_chapters',
        'app.groups_users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Questions') ? [] : ['className' => QuestionsTable::class];
        $this->Questions = TableRegistry::get('Questions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Questions);

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
