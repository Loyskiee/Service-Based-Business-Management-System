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
        User::factory()->count(3)->for($business)->create();
       
         Customer::factory()->for($business)->create();
        
       // Service of kineme shop
        Service::create([
            'business_id' => $business->id,
            'service_name' => 'Example Service',
            'price' => 150
        ]);
    
  }
}
