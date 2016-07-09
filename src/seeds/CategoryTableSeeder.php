<?php

use Illuminate\Database\Seeder;

use Lembarek\Core\Models\Category;

class CategoryTableSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
       factory(Category::class, 30)->create();
    }
}
