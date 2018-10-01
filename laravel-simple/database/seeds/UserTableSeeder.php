<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('qt64_users')->insert(
        [
          [
            'username' => 'sub-admin',
            'password' => bcrypt('12345'),
            'level' => 1,
            'created_at' => new DateTime(),
          ],
          [
            'username' => 'admin',
            'password' => bcrypt('12345'),
            'level' => 1,
            'created_at' => new DateTime(),
          ],
          [
            'username' => 'menber',
            'password' => bcrypt('12345'),
            'level' => 2,
            'created_at' => new DateTime(),
          ],
          [
            'username' => 'user',
            'password' => bcrypt('12345'),
            'level' => 2,
            'created_at' => new DateTime(),
          ]
        ]
      );
    }
}
