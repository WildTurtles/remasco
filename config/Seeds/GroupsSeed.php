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
                'is_deletable' => false,
            ],
            [
                'id' => 'a8b74e50-7080-41ed-b139-4081828cbe3b',
                'name' => 'admin',
                'is_deletable' => false,
            ],
            [
                'id' => '730133f3-a61f-40d9-abe2-4e64605a2fd4',
                'name' => 'students',
                'is_deletable' => false,
            ],
            [
                'id' => '610a6740-b3cc-46fb-b9ef-1830e4ffc77a',
                'name' => 'Seconde_un',
                'is_deletable' => true,
            ],
            [
                'id' => '14763ffb-7ba3-401f-9db3-4c6f5bfe953b',
                'name' => 'Classe Nouvelle',
                'is_deletable' => true,
            ],
            [
                'id' => '5badcee6-0b6d-4fd9-b121-c6e9a58c4d37',
                'name' => 'toto',
                'is_deletable' => true,
            ],
        ];

        $table = $this->table('groups');
        $table->insert($data)->save();
    }
}
