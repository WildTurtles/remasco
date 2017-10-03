<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LinksStepsUsersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LinksStepsUsersTable Test Case
 */
class LinksStepsUsersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\LinksStepsUsersTable
     */
    public $LinksStepsUsers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.links_steps_users',
        'app.users',
        'app.tries',
        'app.answers_questions',
        'app.answers_questions_tries',
        'app.multiple_choice_questions',
        'app.questions',
        'app.answers',
        'app.questions_tries',
        'app.multiple_choice_questions_questions',
        'app.steps',
        'app.paths',
        'app.chapters',
        'app.chapters_paths',
        'app.topics',
        'app.groups',
        'app.groups_topics',
        'app.groups_users',
        'app.topics_chapters',
        'app.topics_users',
        'app.paths_tries',
        'app.paths_users',
        'app.links_steps_users',
        'app.links',
        'app.links_steps',
        'app.links_users',
        'app.multiple_choice_questions_steps',
        'app.opened_questions',
        'app.expected_answers',
        'app.opened_questions_steps',
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
        $config = TableRegistry::exists('LinksStepsUsers') ? [] : ['className' => LinksStepsUsersTable::class];
        $this->LinksStepsUsers = TableRegistry::get('LinksStepsUsers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->LinksStepsUsers);

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
