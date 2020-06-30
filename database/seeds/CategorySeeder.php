<?php

use App\Category;
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
        $categories = [
            [
                'name' => 'Bumbu masakan',
                'slug' => 'bumbu-masakan' 
            ],
            [
                'name' => 'Makanan ringan',
                'slug' => 'makanan-ringan' 
            ],
            [
                'name' => 'Sambal',
                'slug' => 'sambal' 
            ]
        ];
        Category::insert($categories);
    }
}
