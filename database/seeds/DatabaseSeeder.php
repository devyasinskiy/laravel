<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Category;
use App\Product;
use App\Transaction;

class DatabaseSeeder extends Seeder
{

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        User::truncate();
        Category::truncate();
        Product::truncate();
        Transaction::truncate();
        DB::table('category_product')->truncate();


        $userQuantity = 20;
        $categoriesQuantity = 30;
        $productsQuantity = 100;
        $transactionQuantity = 50;


        factory(User::class, $userQuantity)->create();
        factory(Category::class, $categoriesQuantity)->create();
        factory(Product::class, $productsQuantity)->create()->each(
                function($product) {
                $categories = Category::all()->random(mt_rand(1, 3))->pluck('id');
                $product->categories()->attach($categories);
        }
        );
        
        factory(Transaction::class, $transactionQuantity)->create();
        
    }

}
