<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Enums\BookingStatus;
use App\Models\Booking; 
use App\Models\User;
use App\Models\Business;
use App\Models\Customer;
use App\Models\Service;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
    */
    public function run(): void
    {
        $business   = Business::firstOrFail();
        $customer  = Customer::where('business_id', $business->id)->get();
        $service   = Service::where('business_id', $business->id)->get();
        $staffUsers = User::where('business_id', $business->id)->where('role', 'staff')->get();

       for ($i = 1; $i <= 50; $i++) {
        Booking::create([
            'business_id'   => $business->id,
            'customer_id'   => $customer->random()->id,
            'service_id'    => $service->random()->id,
            'user_id'       => $staffUsers->random()->id,
            'status'        => collect([
             BookingStatus::Pending->value,
             BookingStatus::Confirmed->value,
             BookingStatus::Completed->value,
             BookingStatus::Cancelled->value,
         ])->random(),
         'scheduled_at'  => now()
            ->addDays(rand(-45, 90))           
            ->setTime(rand(8, 20), rand(0, 59)), 
       ]);
    }
    }
}
