<?php
namespace App\Test\TestCase\Controller;

use App\Controller\StepsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\StepsController Test Case
 */
class StepsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
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
        'app.links',
        'app.links_steps',
        'app.opened_questions',
        'app.expected_answers',
        'app.opened_questions_steps'
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
