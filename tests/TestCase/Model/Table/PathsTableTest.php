<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PathsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PathsTable Test Case
 */
class PathsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PathsTable
     */
    public $Paths;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
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
        'app.tries',
        'app.users',
        'app.groups',
        'app.topics',
        'app.groups_topics',
        'app.chapters',
        'app.chapters_paths',
        'app.topics_chapters',
        'app.topics_users',
        'app.groups_users',
        'app.paths_users',
        'app.multiple_choice_questions_tries',
        'app.paths_tries',
        'app.multiple_choice_questions_questions',
        'app.multiple_choice_questions_steps',
        'app.opened_questions',
        'app.expected_answers',
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
        $config = TableRegistry::exists('Paths') ? [] : ['className' => PathsTable::class];
        $this->Paths = TableRegistry::get('Paths', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Paths);

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
