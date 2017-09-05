<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UsersFixture
 *
 */
class UsersFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'uuid', 'length' => null, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null],
        'username' => ['type' => 'string', 'length' => 255, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'password' => ['type' => 'string', 'length' => 256, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'lastname' => ['type' => 'string', 'length' => 75, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'firstname' => ['type' => 'string', 'length' => 75, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'avatar' => ['type' => 'string', 'length' => 250, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'display_name' => ['type' => 'string', 'length' => 50, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'email' => ['type' => 'string', 'length' => 150, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        '_indexes' => [
            'users_avatar' => ['type' => 'index', 'columns' => ['avatar'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'users_id' => ['type' => 'unique', 'columns' => ['id'], 'length' => []],
            'users_display_name' => ['type' => 'unique', 'columns' => ['display_name'], 'length' => []],
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
            'id' => '8ebc3498-ac7b-4fb5-8fbe-7025eca8de3b',
            'username' => 'Lorem ipsum dolor sit amet',
            'password' => 'Lorem ipsum dolor sit amet',
            'lastname' => 'Lorem ipsum dolor sit amet',
            'firstname' => 'Lorem ipsum dolor sit amet',
            'avatar' => 'Lorem ipsum dolor sit amet',
            'display_name' => 'Lorem ipsum dolor sit amet',
            'email' => 'Lorem ipsum dolor sit amet'
        ],
    ];
}
