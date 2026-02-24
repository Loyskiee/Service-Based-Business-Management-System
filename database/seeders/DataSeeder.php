<?php

namespace Database\Seeders;

use App\Enums\BookingStatus;
use App\Models\Booking; 
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Business;
use App\Models\Customer;
use App\Models\Service;
use Illuminate\Support\Facades\Hash;

use function Symfony\Component\Clock\now;

class DataSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        



       $business =  Business::create([
            'name' => 'Kineme Shop',
            'address' => '123 Kineme Manila City',
            'contact' => '09929872312',
        ]);
        
         // create an user as admin
        $adminUser = User::factory()->for($business)->create([
            'role' => 'admin'
         ]);

         // create an user as staff
       $staffUsers =  User::factory()->count(3)->for($business)->create();
       


        $customer = Customer::factory()->for($business)->create();
        
       // Service of kineme shop
        $service = Service::create([
            'business_id' => $business->id,
            'service_name' => 'Haircut',
            'price' => 150
        ]);
    
        Booking::create([
        'business_id'  => $business->id,
        'customer_id'  => $customer->id,
        'service_id'   => $service->id,
        'user_id'      => $staffUsers->random()->id,
        'status'       => BookingStatus::Completed->value,
        'scheduled_at' => now(),
        ]);

       
    }
}
