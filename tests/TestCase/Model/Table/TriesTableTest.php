<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TriesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TriesTable Test Case
 */
class TriesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TriesTable
     */
    public $Tries;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
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
        'app.questions',
        'app.answers',
        'app.answers_questions',
        'app.questions_tries',
        'app.answers_questions_tries',
        'app.multiple_choice_questions_questions',
        'app.multiple_choice_questions_steps',
        'app.multiple_choice_questions_tries',
        'app.opened_questions',
        'app.expected_answers',
        'app.opened_questions_steps',
        'app.chapters_paths',
        'app.tries_paths',
        'app.users_paths',
        'app.topics_chapters',
        'app.groups_users',
        'app.paths_users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Tries') ? [] : ['className' => TriesTable::class];
        $this->Tries = TableRegistry::get('Tries', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Tries);

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
