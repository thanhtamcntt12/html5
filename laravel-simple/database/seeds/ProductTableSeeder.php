<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('product')->insert(
          [
            [
              'name' => 'Sản Phẩm 1',
            ],
            [
              'username' => 'Sản Phẩm 2',
            ],
            [
              'name' => 'Sản Phẩm 3',
            ],
            [
              'username' => 'Sản Phẩm 4',
            ],
          ]
        );
    }
}
