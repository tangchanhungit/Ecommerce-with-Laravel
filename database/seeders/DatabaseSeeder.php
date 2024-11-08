<?php

namespace Database\Seeders;

use App\Models\OrderDetail;
use Illuminate\Database\Seeder;

use Database\Seeders\Products\CategorySeeder;
use Database\Seeders\Products\ProductCategorySeeder;
use Database\Seeders\Products\ProductSeeder;
use Database\Seeders\User\RoleSeeder;
use Database\Seeders\User\UserSeeder;
use Database\Seeders\User\RoleUserSeeder;
use Database\Seeders\Orders\OrderSeeder;
use Database\Seeders\Orders\OrderDetailSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            RoleUserSeeder::class,
            ProductSeeder::class,
            CategorySeeder::class,
            ProductCategorySeeder::class,
            OrderSeeder::class,
            OrderDetailSeeder::class,
        ]);
    }
}
