<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LinksTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LinksTable Test Case
 */
class LinksTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\LinksTable
     */
    public $Links;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.links',
        'app.steps',
        'app.paths',
        'app.chapters',
        'app.chapters_paths',
        'app.topics',
        'app.groups',
        'app.groups_topics',
        'app.users',
        'app.tries',
        'app.answers_questions',
        'app.answers_questions_tries',
        'app.multiple_choice_questions',
        'app.questions',
        'app.answers',
        'app.questions_tries',
        'app.multiple_choice_questions_questions',
        'app.multiple_choice_questions_steps',
        'app.multiple_choice_questions_tries',
        'app.paths_tries',
        'app.groups_users',
        'app.paths_users',
        'app.topics_chapters',
        'app.topics_users',
        'app.links_steps',
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
        $config = TableRegistry::exists('Links') ? [] : ['className' => LinksTable::class];
        $this->Links = TableRegistry::get('Links', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Links);

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
