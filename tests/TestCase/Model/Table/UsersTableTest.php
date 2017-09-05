<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UsersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UsersTable Test Case
 */
class UsersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UsersTable
     */
    public $Users;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
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
        'app.links',
        'app.links_steps',
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
        $config = TableRegistry::exists('Users') ? [] : ['className' => UsersTable::class];
        $this->Users = TableRegistry::get('Users', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Users);

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

    /**
     * Test validationPassword method
     *
     * @return void
     */
    public function testValidationPassword()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
