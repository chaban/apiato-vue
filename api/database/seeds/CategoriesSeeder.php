<?php

use App\Containers\Category\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @param \Faker\Generator $faker
     */
    public function run(Faker\Generator $faker)
    {
        Model::unguard();
        foreach (range(1, 5) as $key => $value) {
            $node = [
                'name' => $faker->sentence(2, true),
                'attr' => json_encode([['name' => $faker->sentence(2, true), 'suffix' => $faker->word],
                                       ['name' => $faker->sentence(2, true), 'suffix' => $faker->word]])
            ];
            $category = Category::create($node);
            $category->save();
            if($key % 2 == 0){
                $childNode = Category::create([
                    'name' => $faker->sentence(2, true),
                    'attr' => json_encode([['name' => $faker->sentence(2, true), 'suffix' => $faker->word],
                                           ['name' => $faker->sentence(2, true), 'suffix' => $faker->word]])
                ]);
                $childNode->appendToNode($category)->save();
            }
        }
    }
}


