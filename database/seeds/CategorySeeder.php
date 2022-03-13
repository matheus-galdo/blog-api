<?php

use App\Model\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(['name' => 'PHP']);
        Category::create(['name' => 'React']);
        Category::create(['name' => 'Javascript']);
        Category::create(['name' => 'Node.js']);
        Category::create(['name' => 'Desenvolvimento Pessoal']);
    }
}
