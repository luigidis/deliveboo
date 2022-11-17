<?php

use App\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Asiatico', 'Indiano', 'Brasiliano', 'Italiano', 'Giapponese', 'Cinese'];

        foreach($categories as $category) {
            $c = new Category(); 

            $c->name = $category;
            $c->slug = Str::slug($category);
            
            $c->save();
        }
    }
}
