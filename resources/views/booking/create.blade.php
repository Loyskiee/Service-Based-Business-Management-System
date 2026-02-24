<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create a booking</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
  
  <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create New Booking') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-8">
                
                <form action="{{ route('bookings.store') }}" method="POST">
                    @csrf

                    <div class="space-y-8">
                        <div class="grid grid-cols-1 gap-y-6 sm:grid-cols-6 border-b border-gray-200 dark:border-gray-700 pb-8">
                            
                            <div class="sm:col-span-4">
                                <label for="customer_id" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Customer</label>
                                <div class="mt-2">
                                    <select name="customer_id" id="customer_id" required 
                                        class="block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm sm:text-sm">
                                        <option value="" disabled selected>Select a customer...</option>
                                        @foreach ($customers as $customer)
                                            <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="sm:col-span-4">
                                <label for="service_id" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Service</label>
                                <div class="mt-2">
                                    <select name="service_id" id="service_id" required 
                                        class="block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm sm:text-sm">
                                        <option value="" disabled selected>Choose a service...</option>
                                        @foreach ($services as $service)
                                            <option value="{{ $service->id }}">{{ $service->service_name }}</option>
                                        @endforeach
                                    </select> 
                                </div>
                            </div>
                            
                            <div class="sm:col-span-4">
                                <label for="scheduled_at" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Scheduled Date & Time</label>
                                <div class="mt-2">
                                    <input type="datetime-local" name="scheduled_at" id="scheduled_at" required 
                                           class="block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm sm:text-sm">
                                </div> 
                            </div>

                        </div>
                    </div>

                    <div class="mt-6 flex items-center justify-end gap-x-6">
                        <a href="{{ route('bookings.index') }}" class="text-sm font-semibold leading-6 text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100">Cancel</a>
                        <button type="submit" 
                                class="rounded-md bg-indigo-600 px-6 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 transition duration-150">
                            Save Booking
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>                                                                                       
</body>
</html>
