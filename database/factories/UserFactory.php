<?php

use Faker\Generator as Faker;

use App\User;
use App\Category;
use App\Product;
use App\Transaction;
use App\Seller;
/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        //'email_verified_at' => now(),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
        'verified' => $varified = $faker->randomElement([User::VERIFIED_USER,User::UNVERIFIED_USER]),
        'verification_token' => $varified == User::VERIFIED_USER ? null : User::generateVerificationCode(),
        'admin' => $varified = $faker->randomElement([User::ADMIN_USER,User::REGULAR_USER]),
    ];
});

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->paragraph(1),
    ];
});

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->paragraph(1),
        'quantity' => $faker->numberBetween(1,10),
        'status' => $faker->randomElement([Product::AVAILABLE_PRODUCT, Product::UNAVAILABLE_PRODUCT]),
        'image' => $faker->randomElement(['1.jpg','2.jpg','3.jpg']),
        'seller_id' => User::all()->random()->id,
    ];
});


$factory->define(Transaction::class, function (Faker $faker) {
    
 
//    $seller = Seller::has('products')->get()->random();
//    
//    if(count($seller) < 555){
//         throw new InvalidArgumentException("Unable to");
//
//    }
    
    //$buyer = User::all()->exept($seller->id)->random();
    
    return [
        'quantity' => $faker->numberBetween(1,3),
        'buyer_id' => $faker->numberBetween(1,20),
        'product_id' => $faker->numberBetween(1,100),
        
    ];
});