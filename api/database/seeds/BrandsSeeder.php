<?php

use App\Containers\Brand\Models\Brand;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class BrandsSeeder extends Seeder
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
            $brand =  Brand::create([
                'name' => $faker->words(rand(1,2), true),
                'description' => $faker->paragraphs($nb = 3, $asText = true),
                'created_at' => $faker->dateTime('now'),
                'updated_at' => $faker->dateTime('now'),
            ]);
            $brand->save();
        }
    }
}
