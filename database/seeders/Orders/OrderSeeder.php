<?php

namespace Database\Seeders\Orders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\User;
use App\Models\OrderDetail;
use App\Models\Role;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $customerRole = Role::where('role_name', 'customer')->first();
        $usersWithCustomerRole = User::whereHas('roles', function ($query) use ($customerRole) {
            $query->where('roles.id', $customerRole->id);
        })->get();

        if ($usersWithCustomerRole->isNotEmpty()) {
            Order::factory()
                ->count(50)
                ->create()
                ->each(function ($order) use ($usersWithCustomerRole) {
                   
                    $order->user_id = $usersWithCustomerRole->random()->id;
                    $order->save();

                    OrderDetail::factory()->count(3)->create([
                        'order_id' => $order->id,
                    ]);
                });
        }
    }
}
