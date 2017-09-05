<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ChaptersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ChaptersTable Test Case
 */
class ChaptersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ChaptersTable
     */
    public $Chapters;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
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
        'app.tries',
        'app.users',
        'app.groups',
        'app.topics',
        'app.groups_topics',
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
        'app.opened_questions_steps',
        'app.chapters_paths'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Chapters') ? [] : ['className' => ChaptersTable::class];
        $this->Chapters = TableRegistry::get('Chapters', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Chapters);

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
