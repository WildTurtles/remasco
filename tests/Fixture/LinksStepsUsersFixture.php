<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * LinksStepsUsersFixture
 *
 */
class LinksStepsUsersFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'user_id' => ['type' => 'uuid', 'length' => null, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null],
        'step_id' => ['type' => 'uuid', 'length' => null, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null],
        'link_id' => ['type' => 'uuid', 'length' => null, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null],
        'lock' => ['type' => 'boolean', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'created' => ['type' => 'timestamp', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'updated' => ['type' => 'timestamp', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        '_indexes' => [
            'links_steps_users_user_id' => ['type' => 'index', 'columns' => ['user_id'], 'length' => []],
            'links_steps_users_step_id' => ['type' => 'index', 'columns' => ['step_id'], 'length' => []],
            'links_steps_users_link_id' => ['type' => 'index', 'columns' => ['link_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['user_id', 'step_id', 'link_id'], 'length' => []],
            'fklinks_step432364' => ['type' => 'foreign', 'columns' => ['link_id'], 'references' => ['links', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fklinks_step670118' => ['type' => 'foreign', 'columns' => ['step_id'], 'references' => ['steps', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fklinks_step926972' => ['type' => 'foreign', 'columns' => ['user_id'], 'references' => ['users', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'user_id' => '84147b8a-3ba4-4b9c-950e-92ead9c0c37b',
            'step_id' => '4a2efa67-ccd9-43e5-a730-0539eb381fd6',
            'link_id' => '31df2c40-a95a-41ac-99ac-6c0e8dd99313',
            'lock' => 1,
            'created' => 1506867126,
            'updated' => 1506867126
        ],
    ];
}
