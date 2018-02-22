<?php

use Apiato\Core\Loaders\SeederLoaderTrait;
use Illuminate\Database\Seeder as LaravelSeeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Class DatabaseSeeder
 *
 * @author  Mahmoud Zalt  <mahmoud@zalt.me>
 */
class DatabaseSeeder extends LaravelSeeder
{

    use SeederLoaderTrait;

    private $tables = [
        'brands',
        'categories',
        'products'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $this->cleanDatabase();
        $this->runLoadingSeeders();

        $this->call('BrandsSeeder');
        $this->call('CategoriesSeeder');
        $this->call('ProductsSeeder');
    }

    private function cleanDatabase()
    {
        //DB::statement(DB::raw('SET FOREIGN_KEY_CHECKS=0'));
        foreach ($this->tables as $table) {
            DB::table($table)->truncate();
        }
        //DB::statement(DB::raw('SET FOREIGN_KEY_CHECKS=1'));
    }
}
