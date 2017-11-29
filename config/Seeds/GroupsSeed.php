<?php
use Migrations\AbstractSeed;

/**
 * Groups seed.
 */
class GroupsSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'id' => '14a3f3f8-c42a-447d-b5fb-d58dff8badd4',
                'name' => 'teachers',
                'is_deletable' => '0',
            ],
            [
                'id' => 'a8b74e50-7080-41ed-b139-4081828cbe3b',
                'name' => 'admin',
                'is_deletable' => '0',
            ],
            [
                'id' => '730133f3-a61f-40d9-abe2-4e64605a2fd4',
                'name' => 'students',
                'is_deletable' => '0',
            ],
        ];

        $table = $this->table('groups');
        $table->insert($data)->save();
    }
}
