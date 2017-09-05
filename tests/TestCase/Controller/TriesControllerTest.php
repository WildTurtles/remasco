<?php
namespace App\Test\TestCase\Controller;

use App\Controller\TriesController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\TriesController Test Case
 */
class TriesControllerTest extends IntegrationTestCase
{

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
        'app.answers_questions_tries',
        'app.questions_tries',
        'app.multiple_choice_questions_questions',
        'app.multiple_choice_questions_steps',
        'app.multiple_choice_questions_tries',
        'app.opened_questions',
        'app.expected_answers',
        'app.opened_questions_steps',
        'app.chapters_paths',
        'app.tries_paths',
        'app.users_paths',
        'app.paths_users',
        'app.topics_chapters',
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
