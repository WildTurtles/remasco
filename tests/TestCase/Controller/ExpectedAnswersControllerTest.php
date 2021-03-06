<?php
namespace App\Test\TestCase\Controller;

use App\Controller\ExpectedAnswersController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\ExpectedAnswersController Test Case
 */
class ExpectedAnswersControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.expected_answers',
        'app.opened_questions',
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
        'app.questions_tries',
        'app.answers',
        'app.questions',
        'app.multiple_choice_questions_questions',
        'app.multiple_choice_questions',
        'app.multiple_choice_questions_steps',
        'app.multiple_choice_questions_tries',
        'app.tries_paths',
        'app.groups_users',
        'app.users_paths',
        'app.topics_chapters',
        'app.links',
        'app.links_steps',
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
