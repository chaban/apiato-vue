<?php

use App\Containers\Product\Models\Product;
use App\Containers\Category\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @param \Faker\Generator $faker
     */
    public function run(Faker\Generator $faker)
    {
        Model::unguard();
        foreach (range(1, 20) as $key => $value) {
            $count    = Category::count();
            $category = Category::find($faker->numberBetween(1, $count));
            $Product  = Product::create([
                'name'        => $faker->words(rand(1, 2), true),
                'category_id' => $category->id,
                'desc'        => $faker->paragraphs($nb = 3, $asText = true),
                'price'       => $faker->numberBetween(200, 900000),
                'attr'        => $this->generateAttributes($category, $faker),
                'created_at'  => $faker->dateTime('now'),
                'updated_at'  => $faker->dateTime('now'),
            ]);
            $Product->save();
        }
    }

    private function generateAttributes(Category $category, $faker)
    {
        $temp = [];
        $categoryAttributes = json_decode($category->attr);
        foreach ($categoryAttributes as $key => $categoryAttribute) {
            $temp[$key]['name'] = $categoryAttribute->name;
            $temp[$key]['value'] = $faker->words(rand(1, 2), true);
            $temp[$key]['suffix'] = $categoryAttribute->suffix;
        }
        return json_encode($temp);
    }
}


