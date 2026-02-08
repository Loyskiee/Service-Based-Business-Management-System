<?php

namespace Database\Seeders;

use App\Enums\BookingStatus;
use App\Models\Booking; 
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Business;
use App\Models\Customer;
use App\Models\Role;
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
        
       $admin = Role::firstOrCreate(['name' => 'admin']);
       $staff = Role::firstOrCreate(['name' => 'staff']);


       $business =  Business::create([
            'name' => 'Kineme Shop',
            'address' => '123 Kineme Manila City',
            'contact' => '09929872312',
        ]);
        
         // create an user as admin
        $adminUser = User::factory()->for($business)->create();
        $adminUser->roles()->attach($admin);

         // create an user as staff
        $staffUser = User::factory()->for($business)->create();
        $staffUser->roles()->attach($staff);


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
        'user_id'      => $staffUser->id,
        'status'       => BookingStatus::Completed->value,
        'scheduled_at' => now(),
        ]);

       
    }
}
