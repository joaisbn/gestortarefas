<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    protected $faker;

    public function __construct()
    {
        $this->faker = \Faker\Factory::create('pt_BR');
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'username' => 'user1',
                'password' => password_hash('user1', PASSWORD_DEFAULT),
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'username' => 'user2',
                'password' => password_hash('user2', PASSWORD_DEFAULT),
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'username' => 'user3',
                'password' => password_hash('user3', PASSWORD_DEFAULT),
                'created_at' => date('Y-m-d H:i:s')
            ],
        ]);

        $i = 0;
        for ($i = 0; $i <= 100; $i++) {
            $data[] = [
                'username' => $this->faker->userName(),
                'password' => password_hash('123', PASSWORD_DEFAULT),
                'created_at' => date('Y-m-d H:i:s'),
            ];
        }

        DB::table('users')->insert($data);
    }
}
