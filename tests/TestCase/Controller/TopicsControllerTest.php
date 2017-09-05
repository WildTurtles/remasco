<?php
namespace App\Test\TestCase\Controller;

use App\Controller\TopicsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\TopicsController Test Case
 */
class TopicsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.topics',
        'app.groups',
        'app.groups_topics',
        'app.users',
        'app.tries',
        'app.answers_questions',
        'app.answers_questions_tries',
        'app.questions_tries',
        'app.answers',
        'app.questions',
        'app.multiple_choice_questions_questions',
        'app.multiple_choice_questions',
        'app.steps',
        'app.paths',
        'app.chapters',
        'app.chapters_paths',
        'app.topics_chapters',
        'app.paths_tries',
        'app.paths_users',
        'app.links',
        'app.links_steps',
        'app.multiple_choice_questions_steps',
        'app.opened_questions',
        'app.expected_answers',
        'app.opened_questions_steps',
        'app.multiple_choice_questions_tries',
        'app.groups_users'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
