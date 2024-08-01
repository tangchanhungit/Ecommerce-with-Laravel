<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Role;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */


    public function definition(): array
    {
        $customerRole = Role::where('role_name', 'customer')->first();

        $usersWithCustomerRole = User::whereHas('roles', function ($query) use ($customerRole) {
            $query->where('roles.id', $customerRole->id);
        })->pluck('id');

        $paymentMethods = ['credit_card', 'paypal', 'bank_transfer', 'cash'];

        return [ 
            'user_id' => $this->faker->randomElement($usersWithCustomerRole), // Assign a user with the "customer" role
            'order_number' => $this->faker->unique()->word,
            'status' => $this->faker->randomElement(['pending', 'processing', 'completed', 'cancelled']),
            'total_amount' => $this->faker->randomFloat(2, 10, 100),
            'shipping_address' => $this->faker->address,
            'payment_method' => $this->faker->randomElement($paymentMethods),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    
    }
}
